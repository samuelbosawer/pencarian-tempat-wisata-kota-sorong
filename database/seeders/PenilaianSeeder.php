<?php

namespace Database\Seeders;

use App\Models\Penilaian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 3,
                'wisata_id' => 1,
                'saran_p' => 'Perlu penambahan papan informasi sejarah agar pengunjung lebih memahami lokasi.',
            ],
            [
                'user_id' => 3,
                'wisata_id' => 2,
                'saran_p' => 'Kebersihan pantai sudah baik, namun fasilitas tempat sampah masih perlu ditambah.',
            ],
            [
                'user_id' => 3,
                'wisata_id' => 3,
                'saran_p' => 'Akses jalan menuju lokasi perlu diperbaiki untuk kenyamanan pengunjung.',
            ],
            [
                'user_id' => 3,
                'wisata_id' => 4,
                'saran_p' => 'Potensi wisata bahari sangat baik, perlu promosi dan pengelolaan yang lebih maksimal.',
            ],
            [
                'user_id' => 3,
                'wisata_id' => 5,
                'saran_p' => 'Lingkungan sudah nyaman dan tenang, perlu dijaga kebersihan dan ketertiban.',
            ],
        ];

        foreach ($data as $item) {
            Penilaian::create($item);
        }
    }
}
