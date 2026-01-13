@extends('visitor.layout.tamplate')

@section('content')

<div class="visit-country py-5">
    <div class="container">

        <!-- LOGO & JUDUL -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <img src="{{ asset('assets/img/logo.png') }}"
                     alt="Logo Dinas Pariwisata Kota Sorong"
                     style="width:140px;margin-bottom:20px;">
                <h2 class="fw-bold">Aplikasi Pencarian Wisata Kota Sorong</h2>
                <p class="mt-3">
                    Sistem Informasi Pariwisata yang dikembangkan oleh
                    <strong>Dinas Pariwisata Kota Sorong</strong>
                </p>
            </div>
        </div>

        <!-- DESKRIPSI APLIKASI -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="item p-4">
                    <div class="right-content">

                        <h4 class="mb-3">Tentang Aplikasi</h4>
                        <p>
                            Aplikasi Pencarian Wisata Kota Sorong merupakan sebuah sistem informasi
                            berbasis web yang dirancang untuk memberikan kemudahan bagi masyarakat
                            dan wisatawan dalam memperoleh informasi destinasi wisata yang ada di
                            Kota Sorong secara akurat, informatif, dan mudah diakses.
                        </p>

                        <p>
                            Aplikasi ini dikembangkan sebagai bentuk dukungan terhadap promosi
                            pariwisata daerah serta sebagai media digital resmi yang dikelola oleh
                            Dinas Pariwisata Kota Sorong.
                        </p>

                        <h4 class="mt-4 mb-3">Tujuan Pengembangan</h4>
                        <div>
                            <p class="mb-0">✅Menyediakan informasi wisata Kota Sorong secara terpusat</p>
                            <p class="mb-0">✅Membantu wisatawan dalam menentukan destinasi wisata</p>
                            <p class="mb-0">✅Mendukung promosi pariwisata daerah secara digital</p>
                            <p class="mb-0">✅Meningkatkan daya tarik wisata Kota Sorong</p>
                        </div>

                        <h4 class="mt-4 mb-3">Fitur Utama Aplikasi</h4>
                            <p class="mb-0">✅Daftar destinasi wisata Kota Sorong</p>
                            <p class="mb-0">✅Pencarian wisata berdasarkan kategori</p>
                            <p class="mb-0">✅Penilaian dan ulasan pengunjung</p>
                            <p class="mb-0">✅Rekomendasi wisata terbaik berbasis sistem</p>

                        <h4 class="mt-4 mb-3">Manfaat Aplikasi</h4>
                        <p>
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
