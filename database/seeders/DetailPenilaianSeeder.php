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
            // Penilaian ID 1
            [
                'penilaian_id' => 1,
                'kriteria_id' => 1,
                'skala_penilaian_id' => 4,
            ],
            [
                'penilaian_id' => 1,
                'kriteria_id' => 2,
                'skala_penilaian_id' => 3,
            ],
            [
                'penilaian_id' => 1,
                'kriteria_id' => 3,
                'skala_penilaian_id' => 4,
            ],

            // Penilaian ID 2
            [
                'penilaian_id' => 2,
                'kriteria_id' => 1,
                'skala_penilaian_id' => 5,
            ],
            [
                'penilaian_id' => 2,
                'kriteria_id' => 2,
                'skala_penilaian_id' => 4,
            ],
        ];

        foreach ($data as $item) {
            DetailPenilaian::create($item);
        }
    }
}
