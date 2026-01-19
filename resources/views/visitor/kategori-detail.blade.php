@extends('visitor.layout.tamplate')

@section('content')
    <div class="visit-country">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="section-heading">
                        <h2> {{ $judul->nama_ktg }}</h2>
                        <p>Informasi lengkap mengenai seluruh destinasi wisata di Kota Sorong yang dikelompokkan sebagai
                            potensi wisata daerah.</p>

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
                                                        {{-- GAMBAR DARI STORAGE --}}
                                                        <img src="{{ asset('storage/' . $w->gambar_w) }}"
                                                            alt="Gambar Wisata">
                                                    @elseif ($w->gambar_w && file_exists(public_path($w->gambar_w)))
                                                        {{-- GAMBAR DARI ASSET BIASA --}}
                                                        <img src="{{ asset($w->gambar_w) }}" alt="Gambar Wisata">
                                                    @else
                                                        {{-- PLACEHOLDER --}}
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

                                                    <p><i class="fa fa-user"></i> {{ $w->penilaian->count() }} </p>
                                                    <div class="text-button">
                                                        <a href="{{ route('detail', $w->id) }}">Lihat Detail <i
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
@endsection
