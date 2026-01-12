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
            // ===== A1 | wisata_id = 1 | user_id = 3 =====
            ['user_id' => 3, 'wisata_id' => 1, 'saran_p' => 'Tempat wisata ini cukup menarik dan mudah diakses.'],
            ['user_id' => 4, 'wisata_id' => 1, 'saran_p' => 'Lingkungan sekitar cukup bersih dan nyaman untuk dikunjungi.'],
            ['user_id' => 5, 'wisata_id' => 1, 'saran_p' => 'Fasilitas yang tersedia masih bisa ditingkatkan lagi.'],
            ['user_id' => 6, 'wisata_id' => 1, 'saran_p' => 'Suasana lokasi cukup mendukung untuk rekreasi keluarga.'],
            ['user_id' => 7, 'wisata_id' => 1, 'saran_p' => 'Keamanan lokasi sudah baik, pengunjung merasa cukup aman.'],
            ['user_id' => 8, 'wisata_id' => 1, 'saran_p' => 'Akses informasi wisata masih perlu ditambah agar lebih jelas.'],

            // ===== A2 | wisata_id = 2 | user_id = 4 =====
            ['user_id' => 3, 'wisata_id' => 2, 'saran_p' => 'Pantai ini memiliki pemandangan yang indah dan alami.'],
            ['user_id' => 4, 'wisata_id' => 2, 'saran_p' => 'Fasilitas pendukung sudah cukup baik untuk wisatawan.'],
            ['user_id' => 5, 'wisata_id' => 2, 'saran_p' => 'Akses jalan menuju lokasi relatif mudah dilalui.'],
            ['user_id' => 6, 'wisata_id' => 2, 'saran_p' => 'Kebersihan pantai cukup terjaga, meski masih bisa ditingkatkan.'],
            ['user_id' => 7, 'wisata_id' => 2, 'saran_p' => 'Tempat ini cocok untuk wisata keluarga maupun rombongan.'],
            ['user_id' => 8, 'wisata_id' => 2, 'saran_p' => 'Keamanan pengunjung sudah cukup baik di area wisata.'],

            // ===== A3 | wisata_id = 3 | user_id = 5 =====
            ['user_id' => 3, 'wisata_id' => 3, 'saran_p' => 'Lokasi wisata memiliki potensi yang besar untuk dikembangkan.'],
            ['user_id' => 4, 'wisata_id' => 3, 'saran_p' => 'Akses menuju lokasi masih perlu perbaikan.'],
            ['user_id' => 5, 'wisata_id' => 3, 'saran_p' => 'Fasilitas dasar sudah tersedia dan cukup memadai.'],
            ['user_id' => 6, 'wisata_id' => 3, 'saran_p' => 'Suasana tempat wisata sangat mendukung untuk bersantai.'],
            ['user_id' => 7, 'wisata_id' => 3, 'saran_p' => 'Kebersihan area wisata cukup terjaga dengan baik.'],
            ['user_id' => 8, 'wisata_id' => 3, 'saran_p' => 'Informasi wisata perlu ditingkatkan agar lebih informatif.'],

            // ===== A4 | wisata_id = 4 | user_id = 6 =====
            ['user_id' => 3, 'wisata_id' => 4, 'saran_p' => 'Potensi wisata bahari di lokasi ini sangat menjanjikan.'],
            ['user_id' => 4, 'wisata_id' => 4, 'saran_p' => 'Fasilitas umum masih perlu perhatian lebih.'],
            ['user_id' => 5, 'wisata_id' => 4, 'saran_p' => 'Akses menuju lokasi cukup menantang namun masih bisa dilalui.'],
            ['user_id' => 6, 'wisata_id' => 4, 'saran_p' => 'Suasana alamnya masih sangat alami dan asri.'],
            ['user_id' => 7, 'wisata_id' => 4, 'saran_p' => 'Keamanan pengunjung perlu ditingkatkan terutama saat ramai.'],
            ['user_id' => 8, 'wisata_id' => 4, 'saran_p' => 'Promosi wisata perlu ditingkatkan agar lebih dikenal.'],

            // ===== A5 | wisata_id = 5 | user_id = 7 =====
            ['user_id' => 3, 'wisata_id' => 5, 'saran_p' => 'Lingkungan wisata terasa nyaman dan tenang.'],
            ['user_id' => 4, 'wisata_id' => 5, 'saran_p' => 'Fasilitas yang tersedia cukup membantu kenyamanan pengunjung.'],
            ['user_id' => 5, 'wisata_id' => 5, 'saran_p' => 'Akses menuju lokasi sudah cukup baik.'],
            ['user_id' => 6, 'wisata_id' => 5, 'saran_p' => 'Kebersihan area wisata perlu terus dijaga.'],
            ['user_id' => 7, 'wisata_id' => 5, 'saran_p' => 'Tempat ini cocok untuk wisata santai bersama keluarga.'],
            ['user_id' => 8, 'wisata_id' => 5, 'saran_p' => 'Pengelolaan wisata sudah baik namun masih bisa dikembangkan.'],
        ];

        foreach ($data as $item) {
            Penilaian::create($item);
        }
    }
}
