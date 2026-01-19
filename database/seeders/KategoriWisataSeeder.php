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
            ['nama_ktg' => 'Wisata Alam'],        // id = 1
            ['nama_ktg' => 'Wisata Budaya'],      // id = 2
            ['nama_ktg' => 'Wisata Cagar Alam'],  // id = 3
            ['nama_ktg' => 'Wisata Gua'],         // id = 4
            ['nama_ktg' => 'Wisata Pantai'],      // id = 5
            ['nama_ktg' => 'Wisata Pantai dan Kuliner'], // id = 6
            ['nama_ktg' => 'Wisata Pantai dan Olahraga'], // id = 7
            ['nama_ktg' => 'Wisata Religi'],      // id = 8
        ];

        foreach ($data as $item) {
            KategoriWisata::create($item);
        }

    }
}
