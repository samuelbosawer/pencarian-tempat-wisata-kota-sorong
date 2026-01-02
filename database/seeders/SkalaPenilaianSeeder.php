<?php

namespace Database\Seeders;

use App\Models\SkalaPenilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkalaPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $skala = SkalaPenilaian::create([
            'nama_s' => 'tes',
            'nilai_s' => '1',
        ]);

         $skala = SkalaPenilaian::create([
            'nama_s' => 'tes 2',
            'nilai_s' => '2',
        ]);
    }
}
