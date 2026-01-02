<?php

namespace Database\Seeders;

use App\Models\KategoriWisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriWisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama_ktg' => 'Wisata Alam'],
            ['nama_ktg' => 'Wisata Budaya'],
            ['nama_ktg' => 'Wisata Sejarah'],
            ['nama_ktg' => 'Wisata Religi'],
            ['nama_ktg' => 'Wisata Kuliner'],
            ['nama_ktg' => 'Wisata Edukasi'],
        ];

        foreach ($data as $item) {
            KategoriWisata::create($item);
        }

    }
}
