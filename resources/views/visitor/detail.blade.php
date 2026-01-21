@extends('visitor.layout.tamplate')

@section('content')
    <div class="visit-country">
        <div class="container">

            {{-- HEADER --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Detail Destinasi Wisata: {{ $data->nama_w }}</h2>
                        <p>Informasi lengkap mengenai destinasi wisata ini di Kota Sorong.</p>
                    </div>
                </div>
            </div>

            {{-- DETAIL WISATA --}}
            <div class="row">
                <div class="col-lg-8">
                    <div class="item">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="image">
                                    @if ($data->gambar_w && Storage::disk('public')->exists($data->gambar_w))
                                        {{-- GAMBAR DARI STORAGE --}}
                                        <img src="{{ asset('storage/' . $data->gambar_w) }}" alt="Gambar Wisata">
                                    @elseif ($data->gambar_w && file_exists(public_path($data->gambar_w)))
                                        {{-- GAMBAR DARI ASSET BIASA --}}
                                        <img src="{{ asset($data->gambar_w) }}" alt="Gambar Wisata">
                                    @else
                                        {{-- PLACEHOLDER --}}
                                        <img src="https://placehold.co/600x400?text=Gambar+Tidak+Tersedia"
                                            alt="Gambar Tidak Tersedia">
                                    @endif

                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="right-content">
                                    <h4>{{ $data->nama_w }}</h4>
                                    <span>Kategori: {{ $data->kategoriWisata->nama_ktg ?? 'Tidak Diketahui' }}</span>
                                    <p>{{ $data->desk_w }}</p>
                                    <p><i class="fa fa-user"></i> {{ $penilaian->count() }} Penilaian</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- SIDEBAR --}}
                <div class="col-lg-4">
                    <div class="sidebar">
                        <h5>Informasi Tambahan</h5>
                        <p>Dikelola oleh: {{ $data->user->nama ?? '-' }}</p>
                    </div>

                    {{-- MOORA --}}
                    <div class="card mt-4">
                        <div class="card-body text-center my-3">
                            <h5>Analisis Rekomendasi (MOORA)</h5>
                            <div class="row mt-3">
                                <div class="col-md-6 border-end">
                                    <p class="text-muted mb-1">Skor Akhir</p>
                                    <h3 class="text-primary">{{ number_format($finalScore, 4) ?? '0' }}</h3>
                                </div>
                                <div class="col-md-6">
                                    <p class="text-muted mb-1">Peringkat</p>
                                    <h3 class="text-success">#{{ $finalRank ?? '0' }}</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PENILAIAN --}}
            <div class="row mt-4">
                <div class="col-lg-12">
                    <h3>Penilaian dan Review</h3>

                    {{-- TOMBOL TAMBAH --}}
                    @if (auth()->check())
                        <button class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#addReviewModal">
                            Tambah Penilaian <i class="fa fa-pen"></i>
                        </button>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-dark mb-3">Login untuk memberi penilaian</a>
                    @endif

                    {{-- LIST REVIEW --}}
                    @forelse ($penilaian as $p)
                        <div class="review-item border p-3 mb-3 rounded">
                            <h5>{{ $p->user->nama ?? 'Anonim' }}</h5>

                            <ul>
                                @foreach ($p->detailPenilaian as $dp)
                                    <li>
                                        <strong>{{ $dp->kriteria->kriteria }}:</strong>
                                        {{ $dp->skalaPenilaian->nama_s }}
                                    </li>
                                @endforeach
                            </ul>

                            <p><strong>Komentar:</strong> {{ $p->saran_p }}</p>

                            {{-- TOMBOL EDIT --}}
                            @if (auth()->id() == $p->user_id)
                                <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#editReviewModal{{ $p->id }}">
                                    Edit <i class="fa fa-edit"></i>
                                </button>
                            @endif
                        </div>
                    @empty
                        <p>Belum ada penilaian.</p>
                    @endforelse
                </div>
            </div>

        </div>
    </div>

    {{-- ================= MODAL TAMBAH PENILAIAN ================= --}}
    @if (auth()->check())
        <div class="modal fade" id="addReviewModal">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('review') }}" method="POST">
                    @csrf
                    <input type="hidden" name="wisata_id" value="{{ $data->id }}">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5>Tambah Penilaian</h5>
                            <button class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">

                            <div class="mb-3">
                                <label>Komentar</label>
                                <textarea class="form-control" name="saran_p"></textarea>
                            </div>

                            <h6>Penilaian Kriteria</h6>

                            @foreach ($kriteria as $k)
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <strong>{{ $k->kriteria }}</strong>
                                    </div>
                                    <div class="col-md-6">
                                        <select name="penilaian[{{ $k->id }}]" class="form-control" required>
                                            <option value="">Pilih Nilai</option>
                                            @foreach ($skala as $s)
                                                <option value="{{ $s->id }}">{{ $s->nama_s }}
                                                    ({{ $s->nilai_s }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- ================= MODAL EDIT PENILAIAN ================= --}}
    @foreach ($penilaian as $p)
        @if (auth()->id() == $p->user_id)
            <div class="modal fade" id="editReviewModal{{ $p->id }}">
                <div class="modal-dialog modal-lg">
                    <form action="{{ route('review_edit', $p->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="modal-content">
                            <div class="modal-header">
                                <h5>Edit Penilaian</h5>
                                <button class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                <div class="mb-3">
                                    <label>Komentar</label>
                                    <textarea class="form-control" name="saran_p">{{ $p->saran_p }}</textarea>
                                </div>

                                <h6>Penilaian Kriteria</h6>

                                @foreach ($kriteria as $k)
                                    @php
                                        $nilai = $p->detailPenilaian->where('kriteria_id', $k->id)->first();
                                    @endphp

                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <strong>{{ $k->kriteria }}</strong>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="penilaian[{{ $k->id }}]" class="form-control" required>
                                                <option value="">Pilih Nilai</option>
                                                @foreach ($skala as $s)
                                                    <option value="{{ $s->id }}"
                                                        @if ($nilai && $nilai->skala_penilaian_id == $s->id) selected @endif  required>
                                                        {{ $s->nama_s }} ({{ $s->nilai_s }})
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    @endforeach

@endsection
