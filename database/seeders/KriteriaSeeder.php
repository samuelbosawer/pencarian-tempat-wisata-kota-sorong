<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'kriteria' => 'Keindahan Alam',
                'bobot' => 0.30,
                'jenis' => 'benefit',
            ],
            [
                'kriteria' => 'Aksesibilitas',
                'bobot' => 0.15,
                'jenis' => 'benefit',
            ],
            [
                'kriteria' => 'Fasilitas Pendukung',
                'bobot' => 0.15,
                'jenis' => 'benefit',
            ],
            [
                'kriteria' => 'Kebersihan dan Keamanan',
                'bobot' => 0.15,
                'jenis' => 'benefit',
            ],
            [
                'kriteria' => 'Biaya/Harga',
                'bobot' => 0.10,
                'jenis' => 'cost',
            ],
            [
                'kriteria' => 'Ulasan/Kepuasan Wisatawan',
                'bobot' => 0.15,
                'jenis' => 'benefit',
            ],
        ];

        foreach ($data as $item) {
            Kriteria::create($item);
        }
    }
}
