<?php

namespace App\Http\Controllers;

use App\Models\DetailPenilaian;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\SkalaPenilaian;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $wisatas = Wisata::inRandomOrder()->take(4)->get();
        return view('visitor.home', compact('wisatas'));
    }

    public function tentang()
    {
        return view('visitor.tentang');
    }

    public function wisata()
    {
        $wisatas = Wisata::inRandomOrder()->get();
        return view('visitor.wisata', compact('wisatas'));
    }

    public function detail($id) {

        $data = Wisata::where('id', $id)->first();
        $penilaian = Penilaian::with('detailPenilaian')->where('wisata_id', $data->id)->orderBy('id', 'desc')->get();
        $kriteria = Kriteria::orderBy('id', 'desc')->get();
        $skala = SkalaPenilaian::orderBy('id', 'desc')->get();
        return view('visitor.detail', compact('data','penilaian','kriteria','skala'));
    }

    public function rekomendasi()
    {
        $kriterias = Kriteria::orderBy('id')->get();

        /*
    |--------------------------------------------------------------------------
    | STEP 1 - Matriks Keputusan (X)
    |--------------------------------------------------------------------------
    */
        $raw = [];

        $penilaians = Penilaian::with('detailPenilaian')->get();

        foreach ($penilaians as $penilaian) {
            foreach ($penilaian->detailPenilaian as $detail) {
                $raw[$penilaian->wisata_id][$detail->kriteria_id][]
                    = $detail->skala_penilaian_id;
            }
        }

        $X = [];
        foreach ($raw as $wisataId => $kriteriaData) {
            foreach ($kriteriaData as $kriteriaId => $nilai) {
                $X[$wisataId][$kriteriaId] =
                    array_sum($nilai) / count($nilai);
            }
        }

        /*
    |--------------------------------------------------------------------------
    | STEP 2 - Normalisasi
    |--------------------------------------------------------------------------
    */
        $pembagi = [];
        foreach ($kriterias as $kriteria) {
            $sum = 0;
            foreach ($X as $wisataId => $nilaiKriteria) {
                $sum += pow($nilaiKriteria[$kriteria->id] ?? 0, 2);
            }
            $pembagi[$kriteria->id] = sqrt($sum);
        }

        $normalisasi = [];
        foreach ($X as $wisataId => $nilaiKriteria) {
            foreach ($nilaiKriteria as $kriteriaId => $nilai) {
                $normalisasi[$wisataId][$kriteriaId] =
                    $nilai / $pembagi[$kriteriaId];
            }
        }

        /*
    |--------------------------------------------------------------------------
    | STEP 3 - Normalisasi Terbobot
    |--------------------------------------------------------------------------
    */
        $terbobot = [];
        foreach ($normalisasi as $wisataId => $nilaiKriteria) {
            foreach ($nilaiKriteria as $kriteriaId => $nilai) {
                $bobot = $kriterias->firstWhere('id', $kriteriaId)->bobot;
                $terbobot[$wisataId][$kriteriaId] = $nilai * $bobot;
            }
        }

        /*
    |--------------------------------------------------------------------------
    | STEP 4 - Nilai Yi (MOORA)
    |--------------------------------------------------------------------------
    */
        $yi = [];

        foreach ($terbobot as $wisataId => $nilaiKriteria) {
            $benefit = 0;
            $cost = 0;

            foreach ($nilaiKriteria as $kriteriaId => $nilai) {
                $jenis = $kriterias->firstWhere('id', $kriteriaId)->jenis;
                if ($jenis === 'benefit') {
                    $benefit += $nilai;
                } else {
                    $cost += $nilai;
                }
            }

            $yi[$wisataId] = $benefit - $cost;
        }

        /*
    |--------------------------------------------------------------------------
    | STEP 5 - Ranking
    |--------------------------------------------------------------------------
    */
        arsort($yi);

        $ranking = [];
        $rank = 1;
        foreach ($yi as $wisataId => $nilai) {
            $ranking[$wisataId] = [
                'rank' => $rank++,
                'nilai' => $nilai
            ];
        }

        /*
    |--------------------------------------------------------------------------
    | Ambil data wisata sesuai ranking
    |--------------------------------------------------------------------------
    */
        $wisatas = Wisata::with(['kategoriWisata', 'penilaian'])
            ->whereIn('id', array_keys($ranking))
            ->get()
            ->sortBy(fn($w) => $ranking[$w->id]['rank']);

        return view('visitor.rekomendasi', compact('wisatas', 'ranking'));
    }

    public function daftar()
    {
        return view('visitor.daftar');
    }

    public function daftarpilih($id)
    {
        if ($id === 'usaha' or $id === 'pengunjung') {
            return view('visitor.daftarpilih', compact('id'));
        } else {
            return redirect()->route('daftar');
        }
    }

    public function daftarstore(Request $request)
    {

        if ($request->role === 'usaha' or $request->role === 'pengunjung') {
              // 1. Validasi
        $validated = $request->validate([
            // Validasi untuk user
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed', // gunakan password_confirmation
        ]);

        // 2. Simpan ke table users

        $user = User::create([
            'nama' => $validated['nama'],
            'tempat_lahir' => $validated['tempat_lahir'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'alamat' => $validated['alamat'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        $user->assignRole($request->role);

        Alert::success('Berhasil', 'Pendaftaran Akun Berhail');
        return redirect()->route('login');
        
        } else {
            return redirect()->route('daftar');
        }

     
    }

    public function profile()
    {
        return view('visitor.profile');
    }

    public function review(Request $request) {
  
        $penilaian = Penilaian::create([
            'user_id' => Auth::user()->id,
            'saran_p' => $request->saran_p,
            'wisata_id' =>  $request->wisata_id,
        ]);
          $detail = DetailPenilaian::create([
            'penilaian_id' => $penilaian->id,
            'kriteria_id' => $request->kriteria_id,
            'skala_penilaian_id' =>  $request->skala_penilaian_id,
        ]);

        Alert::success('Berhasil', 'Data penilaian berhasil ditambahkan');
        return redirect()->route('detail',$request->wisata_id);
    }

    public function hapusreview($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $wisata_id = $penilaian->wisata_id;
        $penilaian->delete();

        Alert::success('Berhasil', 'Data penilaian berhasil dihapus');
         return redirect()->route('detail',$wisata_id);
    }
}
