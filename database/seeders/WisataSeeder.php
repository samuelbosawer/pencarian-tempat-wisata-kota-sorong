<?php

namespace Database\Seeders;

use App\Models\Wisata;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WisataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nama_w' => 'Tanjung Kasuari Sorong',
                'gambar_w' => 'https://placehold.co/600x400?text=Tempat+Wisata',
                'desk_w' => 'Pantai dengan pasir putih dan panorama matahari terbenam yang indah, cocok untuk rekreasi keluarga dan wisata alam.',
                'user_id' => 2,
                'kategori_wisata_id' => 1, // Wisata Alam
            ],

            [
                'nama_w' => 'Bunker dan Goa Jepang',
                'gambar_w' => 'https://placehold.co/600x400?text=Tempat+Wisata',
                'desk_w' => 'Situs bersejarah peninggalan Perang Dunia II berupa bunker dan goa yang digunakan tentara Jepang, menjadi destinasi wisata sejarah di Sorong.',
                'user_id' => 2,
                'kategori_wisata_id' => 3, // Wisata Sejarah
            ],

            [
                'nama_w' => 'Pantai Dofior',
                'gambar_w' => 'https://placehold.co/600x400?text=Tempat+Wisata',
                'desk_w' => 'Pantai alami dengan air laut yang jernih dan suasana tenang, ideal untuk bersantai dan menikmati keindahan alam.',
                'user_id' => 2,
                'kategori_wisata_id' => 1, // Wisata Alam
            ],
            [
                'nama_w' => 'Pulau Raam',
                'gambar_w' => 'https://placehold.co/600x400?text=Tempat+Wisata',
                'desk_w' => 'Pulau kecil di sekitar Sorong yang menawarkan wisata bahari, kehidupan masyarakat lokal, dan pemandangan laut yang eksotis.',
                'user_id' => 2,
                'kategori_wisata_id' => 1, // Wisata Alam
            ],
            [
                'nama_w' => 'Vihara Buddha Jayanti',
                'gambar_w' => 'https://placehold.co/600x400?text=Tempat+Wisata',
                'desk_w' => 'Tempat ibadah umat Buddha yang juga menjadi destinasi wisata religi dengan arsitektur khas dan suasana yang damai.',
                'user_id' => 2,
                'kategori_wisata_id' => 4, // Wisata Religi
            ],
        ];

        foreach ($data as $item) {
            Wisata::create($item);
        }
    }
}
