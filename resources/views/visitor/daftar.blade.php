
@extends('visitor.layout.tamplate')

@section('content')
    

    <!-- ***** Main Banner Area Start ***** -->
    <section id="section-1">
        <div class="content-slider">
            <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
            <input type="radio" id="banner2" class="sec-1-input" name="banner">
            <input type="radio" id="banner3" class="sec-1-input" name="banner">
            <input type="radio" id="banner4" class="sec-1-input" name="banner">
            <div class="slider">

                <!-- SLIDE 1 -->
                <div id="top-banner-1" class="banner">
                    <div class="banner-inner-wrapper header-text">
                        <div class="main-caption">
                            <h2>Jelajahi Keindahan Wisata</h2>
                            {{-- <img src="{{ asset('assets/img/logo.png') }}" class="" width="10px" alt="" srcset="" style="width: 200px"> --}}
                            <h1>Kota Sorong</h1>
                            <div class="border-button"><a href="#wisata">Jelajahi</a></div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="more-info">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-map-marker"></i>
                                                <h4><span>Lokasi:</span><br>Papua Barat Daya</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-tree"></i>
                                                <h4><span>Wisata Alam:</span><br>Pantai & Laut</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-camera"></i>
                                                <h4><span>Daya Tarik:</span><br>Fotografi</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <div class="main-button">
                                                    <a href="#wisata">Lihat Wisata</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 2 -->
                <div id="top-banner-2" class="banner">
                    <div class="banner-inner-wrapper header-text">
                        <div class="main-caption">
                            <h2>Gerbang Menuju Raja Ampat</h2>
                            <h1>Kota Sorong</h1>
                            <div class="border-button"><a href="#wisata">Jelajahi</a></div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="more-info">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-ship"></i>
                                                <h4><span>Akses:</span><br>Pelabuhan & Bandara</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-water"></i>
                                                <h4><span>Laut:</span><br>Eksotis</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-users"></i>
                                                <h4><span>Budaya:</span><br>Lokal Papua</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <div class="main-button">
                                                    <a href="#wisata">Lihat Wisata</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 3 -->
                <div id="top-banner-3" class="banner">
                    <div class="banner-inner-wrapper header-text">
                        <div class="main-caption">
                            <h2>Pesona Alam & Budaya</h2>
                            <h1>Kota Sorong</h1>
                            <div class="border-button"><a href="#wisata">Jelajahi</a></div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="more-info">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-leaf"></i>
                                                <h4><span>Alam:</span><br>Hutan & Pantai</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-music"></i>
                                                <h4><span>Budaya:</span><br>Tarian & Adat</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-heart"></i>
                                                <h4><span>Suasana:</span><br>Ramah & Aman</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <div class="main-button">
                                                    <a href="#wisata">Lihat Wisata</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- SLIDE 4 -->
                <div id="top-banner-4" class="banner">
                    <div class="banner-inner-wrapper header-text">
                        <div class="main-caption">
                            <h2>Destinasi Favorit Papua Barat Daya</h2>
                            <h1>Kota Sorong</h1>
                            <div class="border-button"><a href="#wisata">Jelajahi</a></div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="more-info">
                                        <div class="row">
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-star"></i>
                                                <h4><span>Rekomendasi:</span><br>Wisata Terbaik</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-map"></i>
                                                <h4><span>Lokasi:</span><br>Mudah Dijangkau</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <i class="fa fa-thumbs-up"></i>
                                                <h4><span>Penilaian:</span><br>Pengunjung</h4>
                                            </div>
                                            <div class="col-lg-3 col-sm-6 col-6">
                                                <div class="main-button">
                                                    <a href="#wisata">Lihat Wisata</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <nav>
                <div class="controls">
                    <label for="banner1"><span class="progressbar"><span
                                class="progressbar-fill"></span></span><span class="text">1</span></label>
                    <label for="banner2"><span class="progressbar"><span
                                class="progressbar-fill"></span></span><span class="text">2</span></label>
                    <label for="banner3"><span class="progressbar"><span
                                class="progressbar-fill"></span></span><span class="text">3</span></label>
                    <label for="banner4"><span class="progressbar"><span
                                class="progressbar-fill"></span></span><span class="text">4</span></label>
                </div>
            </nav>
        </div>
    </section>
    <!-- ***** Main Banner Area End ***** -->

    <div class="visit-country">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2>Jelajahi Wisata Kota Sorong</h2>
                        <p>Kota Sorong merupakan gerbang utama Papua Barat yang menawarkan keindahan alam, wisata
                            bahari, budaya lokal, dan destinasi unggulan yang menarik untuk dikunjungi.</p>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="items">
                        <div class="row">


                            @foreach ($wisatas as $w)
                                <div class="col-lg-6">
                                    <div class="item">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-5">
                                                <div class="image">
                                                    @if ($w->gambar_w && Storage::disk('public')->exists($w->gambar_w))
                                            <img src="{{ asset('storage/' . $w->gambar_w) }}" 
                                                alt="Gambar Wisata">
                                        @else
                                            <img src="https://placehold.co/600x400?text=Gambar+Tidak+Tersedia"
                                                 alt="Gambar Tidak Tersedia">
                                        @endif
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-sm-7">
                                                <div class="right-content">
                                                    <h4>{{ $w->nama_w }}</h4>
                                                    <span>{{ $w->kategoriWisata->nama_ktg }}</span>
                                                    {{-- <div class="main-button">
                                                        <a href="about.html">Detail</a>
                                                    </div> --}}
                                                    <p> {{ $w->desk_w ?? '-' }}
                                                    </p>
                                                  
                                                        <p><i class="fa fa-user"></i> {{ $w->penilaian->count()}} </p>
                                                    <div class="text-button">
                                                        <a href="about.html">Lihat Detail <i
                                                                class="fa fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4">
                    <div class="side-bar-map">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth"
                                        width="100%" height="550px" frameborder="0"
                                        style="border:0; border-radius: 23px; " allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

   <div class="call-to-action">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h2>Siap Menjelajahi Wisata Kota Sorong?</h2>
                <h4>Temukan destinasi terbaik dan rencanakan perjalanan wisatamu sekarang</h4>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <div class="border-button">
                    <a href="#wisata">Lihat Destinasi Wisata</a>
                </div>
            </div>
        </div>
    </div>

@endsection
