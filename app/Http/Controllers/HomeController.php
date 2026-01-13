<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Wisata;
use Illuminate\Http\Request;
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
       return view('visitor.home',compact('wisatas'));
    }

    public function tentang()
    {
       return view('visitor.tentang');
    }

    public function wisata()
    {
       $wisatas = Wisata::inRandomOrder()->get();
       return view('visitor.wisata',compact('wisatas'));
    }

    public function detail($id)
    {

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
        ->sortBy(fn ($w) => $ranking[$w->id]['rank']);

    return view('visitor.rekomendasi', compact('wisatas', 'ranking'));
    }

    public function daftar()
    {

    }

    public function daftarstore(Request $request)
    {

    }

    public function review(Request $request)
    {
        
    }

   
}
