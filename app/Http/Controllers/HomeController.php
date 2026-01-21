<?php

namespace App\Http\Controllers;

use App\Models\DetailPenilaian;
use App\Models\KategoriWisata;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\SkalaPenilaian;
use App\Models\User;
use App\Models\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

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

    public function detail($id)
    {

        $data = Wisata::where('id', $id)->first();
        $penilaian = Penilaian::with('detailPenilaian')->where('wisata_id', $data->id)->orderBy('id', 'desc')->get();
        $kriteria = Kriteria::orderBy('id', 'desc')->get();
        $skala = SkalaPenilaian::orderBy('id', 'desc')->get();



        $kriterias = Kriteria::orderBy('id')->get();

        // 1. Ambil SEMUA penilaian untuk perhitungan matriks MOORA
        $penilaians = Penilaian::with('detailPenilaian')->get();
        $raw = [];
        foreach ($penilaians as $p) {
            foreach ($p->detailPenilaian as $detail) {
                $raw[$p->wisata_id][$detail->kriteria_id][] = $detail->skala_penilaian_id;
            }
        }

        // Bangun Matriks Keputusan (X)
        $X = [];
        foreach ($raw as $wId => $kData) {
            foreach ($kData as $kId => $nilai) {
                $X[$wId][$kId] = array_sum($nilai) / count($nilai);
            }
        }

        // 2. Hitung Pembagi (Normalisasi)
        $pembagi = [];
        foreach ($kriterias as $k) {
            $sum = 0;
            foreach ($X as $wId => $nilaiKriteria) {
                $val = $nilaiKriteria[$k->id] ?? 0;
                $sum += pow($val, 2);
            }
            $pembagi[$k->id] = sqrt($sum);
        }

        // 3. Hitung Nilai Yi untuk semua Wisata
        $yi = [];
        foreach ($X as $wId => $nilaiKriteria) {
            $benefit = 0;
            $cost = 0;
            foreach ($nilaiKriteria as $kId => $nilai) {
                $k = $kriterias->firstWhere('id', $kId);
                if (!$k || $pembagi[$kId] == 0) continue;

                $normalisasi = $nilai / $pembagi[$kId];
                $terbobot = $normalisasi * $k->bobot;

                if ($k->jenis === 'benefit') {
                    $benefit += $terbobot;
                } else {
                    $cost += $terbobot;
                }
            }
            $yi[$wId] = $benefit - $cost;
        }

        // 4. Ranking
        arsort($yi);
        $rank = 1;
        $finalRank = 0;
        $finalScore = 0;

        foreach ($yi as $wId => $score) {
            if ($wId == $id) {
                $finalRank = $rank;
                $finalScore = $score;
                break;
            }
            $rank++;
        }



        return view('visitor.detail', compact(
            'data',
            'penilaian',
            'kriteria',
            'skala',
            'finalRank',
            'finalScore'
        ));
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

    public function review(Request $request)
    {

        // Validasi
        $request->validate([
            'wisata_id' => 'required|exists:wisatas,id',
            'saran_p'   => 'nullable|string',
            'penilaian' => 'required|array', // array nilai per kriteria
        ]);

        DB::beginTransaction();

        try {
            // Simpan penilaian utama
            $penilaian = Penilaian::create([
                'user_id'   => Auth::id(),
                'wisata_id' => $request->wisata_id,
                'saran_p'   => $request->saran_p,
            ]);

            // Simpan detail penilaian (SEMUA KRITERIA)
            foreach ($request->penilaian as $kriteria_id => $skala_id) {

                DetailPenilaian::create([
                    'penilaian_id'       => $penilaian->id,
                    'kriteria_id'        => $kriteria_id,
                    'skala_penilaian_id' => $skala_id,
                ]);
            }

            DB::commit();

            Alert::success('Berhasil', 'Penilaian berhasil ditambahkan');
            return redirect()->route('detail', $request->wisata_id);
        } catch (\Exception $e) {
            DB::rollBack();

            Alert::error('Gagal', 'Terjadi kesalahan saat menyimpan penilaian');
            return back()->withInput();
        }
    }

    public function review_edit(Request $request, $id)
    {


        $penilaian = Penilaian::findOrFail($id);

        // Proteksi: hanya pemilik boleh edit
        if (auth()->id() != $penilaian->user_id) {
            abort(403);
        }

        // Update komentar
        $penilaian->update([
            'saran_p' => $request->saran_p,
        ]);

        // Update semua detail penilaian
        if ($request->penilaian) {
            foreach ($request->penilaian as $kriteria_id => $skala_id) {

                DetailPenilaian::updateOrCreate(
                    [
                        'penilaian_id' => $penilaian->id,
                        'kriteria_id'  => $kriteria_id,
                    ],
                    [
                        'skala_penilaian_id' => $skala_id,
                    ]
                );
            }
        }

        Alert::success('Berhasil', 'Penilaian berhasil diperbarui');
        return back();
    }

    public function hapusreview($id)
    {
        $penilaian = Penilaian::findOrFail($id);
        $wisata_id = $penilaian->wisata_id;
        $penilaian->delete();

        Alert::success('Berhasil', 'Data penilaian berhasil dihapus');
        return redirect()->route('detail', $wisata_id);
    }





    public function kategori()
    {
        $data = KategoriWisata::with('wisata')->get();
        return view('visitor.kategori', compact('data'));
    }

    public function kategori_detail($id)
    {
        $judul = KategoriWisata::where('id', $id)->first();
        $wisatas = Wisata::where('kategori_wisata_id', $id)->get();
        return view('visitor.kategori-detail', compact('judul', 'wisatas'));
    }
}
