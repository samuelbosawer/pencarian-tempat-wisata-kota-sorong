@extends('visitor.layout.tamplate')

@section('content')

<style>
    /* Custom styles for modern look */
    .visit-country {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        padding: 60px 0;
    }
    .logo-section {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin-bottom: 40px;
    }
    .logo-section img {
        transition: transform 0.3s ease;
    }
    .logo-section img:hover {
        transform: scale(1.05);
    }
    .content-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin-bottom: 40px;
    }
    .feature-list {
        list-style: none;
        padding: 0;
    }
    .feature-list li {
        background: #f8f9fa;
        margin-bottom: 10px;
        padding: 15px 20px;
        border-radius: 10px;
        border-left: 5px solid #2596be;
        transition: background 0.3s ease;
    }
    .feature-list li:hover {
        background: #e9ecef;
    }
    .call-to-action {
        background: linear-gradient(135deg, #2596be 0%, #3e565f 100%);
        color: white;
        padding: 50px 0;
        margin-top: 60px;
    }
    .call-to-action h2, .call-to-action h4 {
        margin-bottom: 10px;
    }
    .border-button a {
        background: transparent;
        border: 2px solid white;
        color: white;
        padding: 15px 30px;
        text-decoration: none;
        border-radius: 25px;
        transition: all 0.3s ease;
        display: inline-block;
    }
    .border-button a:hover {
        background: white;
        color: #2596be;
        text-decoration: none;
    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .logo-section, .content-card {
            padding: 20px;
        }
        .call-to-action .row {
            text-align: center;
        }
        .call-to-action .col-lg-4 {
            margin-top: 20px;
        }
    }
</style>

<div class="visit-country">
    <div class="container">
        <!-- LOGO & JUDUL -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="logo-section text-center">
                    <img src="{{ asset('assets/img/logo.png') }}"
                         alt="Logo Dinas Pariwisata Kota Sorong"
                         style="width:140px;margin-bottom:20px;">
                    <h2 class="fw-bold">Aplikasi Pencarian Wisata Kota Sorong</h2>
                    <p class="mt-3 text-muted">
                        Sistem Informasi Pariwisata yang dikembangkan oleh
                        <strong>Dinas Pariwisata Kota Sorong</strong>
                    </p>
                </div>
            </div>
        </div>

        <!-- DESKRIPSI APLIKASI -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="content-card">
                    <div class="right-content">
                        <h4 class="mb-3">Tentang Aplikasi</h4>
                        <p class="text-muted">
                            Aplikasi Pencarian Wisata Kota Sorong merupakan sebuah sistem informasi
                            berbasis web yang dirancang untuk memberikan kemudahan bagi masyarakat
                            dan wisatawan dalam memperoleh informasi destinasi wisata yang ada di
                            Kota Sorong secara akurat, informatif, dan mudah diakses.
                        </p>
                        <p class="text-muted">
                            Aplikasi ini dikembangkan sebagai bentuk dukungan terhadap promosi
                            pariwisata daerah serta sebagai media digital resmi yang dikelola oleh
                            Dinas Pariwisata Kota Sorong.
                        </p>

                        <h4 class="mt-4 mb-3 ">Tujuan Pengembangan</h4>
                        <ul class="feature-list">
                            <li>Menyediakan informasi wisata Kota Sorong secara terpusat</li>
                            <li>Membantu wisatawan dalam menentukan destinasi wisata</li>
                            <li>Mendukung promosi pariwisata daerah secara digital</li>
                            <li>Meningkatkan daya tarik wisata Kota Sorong</li>
                        </ul>

                        <h4 class="mt-4 mb-3 ">Fitur Utama Aplikasi</h4>
                        <ul class="feature-list">
                            <li>Daftar destinasi wisata Kota Sorong</li>
                            <li>Pencarian wisata berdasarkan kategori</li>
                            <li>Penilaian dan ulasan pengunjung</li>
                            <li>Rekomendasi wisata terbaik berbasis sistem</li>
                        </ul>

                        <h4 class="mt-4 mb-3 ">Manfaat Aplikasi</h4>
                        <p class="text-muted">
                            Dengan adanya aplikasi ini, diharapkan wisatawan dapat memperoleh
                            rekomendasi destinasi wisata yang sesuai dengan kebutuhan dan preferensi,
                            serta dapat meningkatkan kunjungan wisata dan pertumbuhan ekonomi
                            daerah di Kota Sorong.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CALL TO ACTION -->
<div class="call-to-action">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2>Dukung Pengembangan Pariwisata Kota Sorong</h2>
                <h4>Gunakan aplikasi ini sebagai panduan wisata Anda</h4>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="border-button">
                    <a href="{{ url('/') }}">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection