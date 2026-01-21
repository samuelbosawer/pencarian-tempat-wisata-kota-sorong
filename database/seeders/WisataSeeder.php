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
                'gambar_w' => 'assets/img/data/1.jpg',
                'desk_w' => 'Pantai dengan pasir putih dan panorama matahari terbenam yang indah, cocok untuk rekreasi keluarga dan wisata alam.',
                'user_id' => 2,
                'kategori_wisata_id' => 1, // Wisata Alam
            ],

            [
                'nama_w' => 'Bunker dan Goa Jepang',
                'gambar_w' => 'assets/img/data/2.jpg',
                'desk_w' => 'Situs bersejarah peninggalan Perang Dunia II berupa bunker dan goa yang digunakan tentara Jepang, menjadi destinasi wisata sejarah di Sorong.',
                'user_id' => 9,
                'kategori_wisata_id' => 2, // Wisata Sejarah
            ],

            [
                'nama_w' => 'Tugu Selamat Datang di Dofior',
                'gambar_w' => 'assets/img/data/tugu selamat datang dofior.jpg',
                'desk_w' => 'Ikon budaya yang menjadi simbol penyambutan di wilayah Dofior.',
                'user_id' => 10,
                'kategori_wisata_id' => 2,
            ],
            [
                'nama_w' => 'Pulau Raam',
                'gambar_w' => 'assets/img/data/4.jpg',
                'desk_w' => 'Pulau kecil di sekitar Sorong yang menawarkan wisata bahari, kehidupan masyarakat lokal, dan pemandangan laut yang eksotis.',
                'user_id' => 2,
                'kategori_wisata_id' => 1, // Wisata Alam
            ],
            [
                'nama_w' => 'Vihara Buddha Jayanti',
                'gambar_w' => 'assets/img/data/5.jpg',
                'desk_w' => 'Tempat ibadah umat Buddha yang juga menjadi destinasi wisata religi dengan arsitektur khas dan suasana yang damai.',
                'user_id' => 9,
                'kategori_wisata_id' => 8, // Wisata Religi
            ],






             // Wisata Alam
            [
                'nama_w' => 'Taman Aldear',
                'gambar_w' => 'assets/img/data/taman wisata alam aldear.png',
                'desk_w' => 'Taman kota dengan nuansa alam yang asri dan cocok untuk rekreasi keluarga.',
                'user_id' => 9,
                'kategori_wisata_id' => 1,
            ],
            [
                'nama_w' => 'Taman Faith',
                'gambar_w' => 'assets/img/data/Taman Faith.jpg',
                'desk_w' => 'Taman terbuka hijau sebagai ruang publik dan tempat bersantai.',
                'user_id' => 9,
                'kategori_wisata_id' => 1,
            ],
           

            // Wisata Budaya
          
            [
                'nama_w' => 'Bungker Jepang 2',
                'gambar_w' => 'assets/img/data/bungker jepang  2.jpg',
                'desk_w' => 'Bangunan bersejarah yang menjadi saksi perjuangan masa lalu.',
                'user_id' => 9,
                'kategori_wisata_id' => 2,
            ],

            // Cagar Alam
            [
                'nama_w' => 'Hutan Wisata Arboretum',
                'gambar_w' => 'assets/img/data/hutan wisata arboretum.jpg',
                'desk_w' => 'Kawasan hutan konservasi dengan berbagai jenis flora.',
                'user_id' => 9,
                'kategori_wisata_id' => 3,
            ],
            [
                'nama_w' => 'Taman Wisata Mangrove Klawalu Sorong',
                'gambar_w' => 'assets/img/data/wisata Taman Mangrove sorong.jpg',
                'desk_w' => 'Wisata edukasi dan konservasi hutan mangrove.',
                'user_id' => 9,
                'kategori_wisata_id' => 3,
            ],

            // Wisata Gua
            [
                'nama_w' => 'Goa Jepang',
                'gambar_w' => 'assets/img/data/bungker jepang  1.jpg',
                'desk_w' => 'Goa bersejarah peninggalan Jepang di masa perang.',
                'user_id' => 9,
                'kategori_wisata_id' => 4,
            ],
           

            // Wisata Pantai
            [
                'nama_w' => 'Dermaga Doom',
                'gambar_w' => 'assets/img/data/Dermaga Doom.jpg',
                'desk_w' => 'Dermaga bersejarah dengan panorama laut yang indah.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],
            [
                'nama_w' => 'MOOI Park',
                'gambar_w' => 'assets/img/data/pantai mooi park.jpg',
                'desk_w' => 'Taman wisata pantai modern untuk rekreasi keluarga.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],
            [
                'nama_w' => 'Panorama Beach',
                'gambar_w' => 'assets/img/data/pantai  panorama beach.jpg',
                'desk_w' => 'Pantai dengan pemandangan alam yang menawan.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],
            [
                'nama_w' => 'Pantai Alinda',
                'gambar_w' => 'assets/img/data/pantai alinda.jpg',
                'desk_w' => 'Pantai favorit masyarakat lokal untuk bersantai.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],
            [
                'nama_w' => 'Pantai Cinta',
                'gambar_w' => 'assets/img/data/pulau cinta.jpg',
                'desk_w' => 'Pantai dengan suasana romantis dan pasir putih.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],
           
            [
                'nama_w' => 'Pantai Alinda',
                'gambar_w' => 'assets/img/data/pantai alinda.jpg',
                'desk_w' => 'Pantai dengan keindahan laut dan pasir putih.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],
           
            [
                'nama_w' => 'Pantai Pulau Tsiof',
                'gambar_w' => 'assets/img/data/pulau soop.png',
                'desk_w' => 'Pantai pulau kecil dengan panorama laut biru.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],
            [
                'nama_w' => 'Pantai Saoka',
                'gambar_w' => 'assets/img/data/saoka beach resort sorong.jpg',
                'desk_w' => 'Pantai populer dengan pemandangan matahari terbenam.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],

              [
                'nama_w' => 'Saoka Honai Resort',
                'gambar_w' => 'assets/img/data/saoka honai resto.jpg',
                'desk_w' => 'Resort dengan nuansa budaya dan religi Papua.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],


            [
                'nama_w' => 'Pantai Saupapir',
                'gambar_w' => 'assets/img/data/pantai saupapir.jpg',
                'desk_w' => 'Pantai alami yang masih terjaga keasriannya.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],
            [
                'nama_w' => 'Pantai Tampagaram',
                'gambar_w' => 'assets/img/data/pantai tampagaram.png',
                'desk_w' => 'Pantai dengan suasana tenang dan alami.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],
            [
                'nama_w' => 'Pantai Tanjung Batu',
                'gambar_w' => 'assets/img/data/pantai tanjung batu.jpg',
                'desk_w' => 'Pantai berbatu dengan panorama laut terbuka.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],
            [
                'nama_w' => 'Pantai Tiberias',
                'gambar_w' => 'assets/img/data/pantai tiberias.jpg',
                'desk_w' => 'Pantai wisata keluarga dengan fasilitas pendukung.',
                'user_id' => 9,
                'kategori_wisata_id' => 5,
            ],

            // Pantai + Kuliner
            [
                'nama_w' => 'Pantai dan Pusat Jajanan Tembok Berlin',
                'gambar_w' => 'assets/img/data/Reklamasi sorong(tembok Berlin).jpg',
                'desk_w' => 'Pantai dengan pusat kuliner khas Sorong.',
                'user_id' => 9,
                'kategori_wisata_id' => 6,
            ],

            // Pantai + Olahraga
            [
                'nama_w' => 'Kasuari Valley Beach Resort Sorong',
                'gambar_w' => 'assets/img/data/kasuari valley beach resort sorong.jpg',
                'desk_w' => 'Resort pantai dengan fasilitas olahraga dan rekreasi.',
                'user_id' => 9,
                'kategori_wisata_id' => 7,
            ],
 
            // Religi
          
            [
                'nama_w' => 'Tanah Klasis GKI Sorong',
                'gambar_w' => 'assets/img/data/taman wisata  gereja.png',
                'desk_w' => 'Tempat bersejarah dan pusat kegiatan keagamaan.',
                'user_id' => 9,
                'kategori_wisata_id' => 8,
            ],
           
        ];

        foreach ($data as $item) {
            Wisata::create($item);
        }
    }
}
