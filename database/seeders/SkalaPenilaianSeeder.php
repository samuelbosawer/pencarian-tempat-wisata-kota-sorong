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
         $skalas = [
    1 => 'Sangat Kurang',
    2 => 'Kurang',
    3 => 'Cukup',
    4 => 'Baik',
    5 => 'Sangat Baik',
];

foreach ($skalas as $nilai => $nama) {
    SkalaPenilaian::create([
        'nama_s'  => $nama,
        'nilai_s' => $nilai,
    ]);
}
    }
}
