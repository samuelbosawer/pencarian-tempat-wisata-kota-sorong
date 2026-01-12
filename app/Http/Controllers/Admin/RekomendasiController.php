<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kriteria;
use App\Models\Penilaian;
use App\Models\Wisata;
use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    // Tampilkan semua data
    public function index(Request $request)
    {

        /*
        |--------------------------------------------------------------------------
        | Ambil Data Dasar
        |--------------------------------------------------------------------------
        */
        $kriterias = Kriteria::orderBy('id')->get();
        $wisatas   = Wisata::orderBy('id')->get();

        /*
        |--------------------------------------------------------------------------
        | STEP 1 - Matriks Keputusan (X)
        |--------------------------------------------------------------------------
        | X[wisata_id][kriteria_id] = nilai rata-rata
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
        | STEP 2 - Normalisasi MOORA
        |--------------------------------------------------------------------------
        | x*ij = xij / sqrt(sum(xij^2))
        */
        $pembagi = [];
        foreach ($kriterias as $kriteria) {
            $sumKuadrat = 0;
            foreach ($X as $wisataId => $nilaiKriteria) {
                $sumKuadrat += pow($nilaiKriteria[$kriteria->id] ?? 0, 2);
            }
            $pembagi[$kriteria->id] = sqrt($sumKuadrat);
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
        | yij = x*ij × bobot
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
        | STEP 4 - Nilai Optimasi (Yi)
        |--------------------------------------------------------------------------
        | Yi = Σ benefit − Σ cost
        */
        $yi = [];

        foreach ($terbobot as $wisataId => $nilaiKriteria) {
            $benefit = 0;
            $cost    = 0;

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
            $ranking[] = [
                'wisata'   => $wisatas->firstWhere('id', $wisataId),
                'nilai'    => $nilai,
                'ranking'  => $rank++
            ];
        }

        /*
        |--------------------------------------------------------------------------
        | Kirim ke View
        |--------------------------------------------------------------------------
        */
        return view('admin.rekomendasi.index',compact(
            'kriterias',
            'wisatas',
            'X',
            'normalisasi',
            'terbobot',
            'yi',
            'ranking'));
    }


    // Tampilkan form tambah data
    public function create()
    {
        return view('admin.crud_tamplate.create-update-show');
    }

    // Simpan data baru
    public function store(Request $request) {}

    // Tampilkan detail satu data
    public function show($id)
    {
        return view('admin.crud_tamplate.create-update-show');
    }

    // Tampilkan form edit data
    public function edit($id)
    {
        return view('admin.crud_tamplate.create-update-show');
    }

    // Update data
    public function update(Request $request, $id) {}

    // Hapus data
    public function destroy($id) {}
}
