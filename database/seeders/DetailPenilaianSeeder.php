<?php

namespace Database\Seeders;

use App\Models\DetailPenilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // A1
            ['penilaian_id' => 1,  'kriteria_id' => 1, 'skala_penilaian_id' => 4],
            ['penilaian_id' => 2,  'kriteria_id' => 2, 'skala_penilaian_id' => 3],
            ['penilaian_id' => 3,  'kriteria_id' => 3, 'skala_penilaian_id' => 1],
            ['penilaian_id' => 4,  'kriteria_id' => 4, 'skala_penilaian_id' => 3],
            ['penilaian_id' => 5,  'kriteria_id' => 5, 'skala_penilaian_id' => 2],
            ['penilaian_id' => 6,  'kriteria_id' => 6, 'skala_penilaian_id' => 3],

            // A2
            ['penilaian_id' => 7,  'kriteria_id' => 1, 'skala_penilaian_id' => 3],
            ['penilaian_id' => 8,  'kriteria_id' => 2, 'skala_penilaian_id' => 4],
            ['penilaian_id' => 9,  'kriteria_id' => 3, 'skala_penilaian_id' => 4],
            ['penilaian_id' => 10, 'kriteria_id' => 4, 'skala_penilaian_id' => 2],
            ['penilaian_id' => 11, 'kriteria_id' => 5, 'skala_penilaian_id' => 4],
            ['penilaian_id' => 12, 'kriteria_id' => 6, 'skala_penilaian_id' => 3],

            // A3
            ['penilaian_id' => 13, 'kriteria_id' => 1, 'skala_penilaian_id' => 1],
            ['penilaian_id' => 14, 'kriteria_id' => 2, 'skala_penilaian_id' => 4],
            ['penilaian_id' => 15, 'kriteria_id' => 3, 'skala_penilaian_id' => 4],
            ['penilaian_id' => 16, 'kriteria_id' => 4, 'skala_penilaian_id' => 4],
            ['penilaian_id' => 17, 'kriteria_id' => 5, 'skala_penilaian_id' => 4],
            ['penilaian_id' => 18, 'kriteria_id' => 6, 'skala_penilaian_id' => 1],

            // A4
            ['penilaian_id' => 19, 'kriteria_id' => 1, 'skala_penilaian_id' => 2],
            ['penilaian_id' => 20, 'kriteria_id' => 2, 'skala_penilaian_id' => 1],
            ['penilaian_id' => 21, 'kriteria_id' => 3, 'skala_penilaian_id' => 1],
            ['penilaian_id' => 22, 'kriteria_id' => 4, 'skala_penilaian_id' => 2],
            ['penilaian_id' => 23, 'kriteria_id' => 5, 'skala_penilaian_id' => 1],
            ['penilaian_id' => 24, 'kriteria_id' => 6, 'skala_penilaian_id' => 4],

            // A5
            ['penilaian_id' => 25, 'kriteria_id' => 1, 'skala_penilaian_id' => 4],
            ['penilaian_id' => 26, 'kriteria_id' => 2, 'skala_penilaian_id' => 2],
            ['penilaian_id' => 27, 'kriteria_id' => 3, 'skala_penilaian_id' => 4],
            ['penilaian_id' => 28, 'kriteria_id' => 4, 'skala_penilaian_id' => 2],
            ['penilaian_id' => 29, 'kriteria_id' => 5, 'skala_penilaian_id' => 3],
            ['penilaian_id' => 30, 'kriteria_id' => 6, 'skala_penilaian_id' => 4],
        ];

        foreach ($data as $item) {
            DetailPenilaian::create($item);
        }
    }
}
