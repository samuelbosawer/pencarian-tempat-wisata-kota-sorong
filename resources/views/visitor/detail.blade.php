@extends('visitor.layout.tamplate')

@section('content')

    <div class="visit-country">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h2>Detail Destinasi Wisata: {{ $data->nama_w }}</h2>
                        <p>Informasi lengkap mengenai destinasi wisata ini di Kota Sorong.</p>

                    </div>
                </div>
            </div>
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
                                    <p>{{ $data->desk_w ?? 'Deskripsi tidak tersedia.' }}</p>
                                    <p><i class="fa fa-user"></i> {{ $data->penilaian->count() }} Penilaian</p>
                                    {{-- Tambahkan informasi lain jika diperlukan, seperti alamat, dll. --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    {{-- Bagian tambahan untuk informasi samping, seperti peta atau info kontak --}}
                    <div class="sidebar">
                        <h5>Informasi Tambahan</h5>
                        <p>Dikelola oleh: {{ $data->user->nama ?? 'Tidak Diketahui' }}</p>
                        {{-- Tambahkan elemen lain seperti lokasi, jam buka, dll. jika ada di model --}}
                    </div>
                </div>
            </div>

            {{-- Bagian Penilaian dan Review --}}
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <h3>Penilaian dan Review</h3>
                        <div class="my-3">
                            @if (auth()->check())
                                {{-- Tombol untuk membuka modal --}}
                                <a type="button" class="border-button text-white  bg-dark p-2 shadow rounded "
                                    data-toggle="modal" data-bs-toggle="modal" data-bs-target="#addReviewModal">
                                    Tambah Penilaian <i class="fa fa-pen"></i>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="border-button text-white bg-dark p-2 shadow rounded">
                                    Tambah Penilaian <i class="fa fa-pen"></i>
                                </a>
                            @endif
                        </div>

                        @if ($penilaian->count() > 0)
                            @foreach ($penilaian as $p)
                                <div class="review-item">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h5>Review oleh: {{ $p->user->nama ?? 'Anonim' }}</h5>
                                            {{-- Tampilkan rating berdasarkan detail penilaian --}}
                                            @if ($p->detailPenilaian)
                                                <ul class="rating-list">
                                                    @foreach ($p->detailPenilaian as $dp)
                                                        <li>
                                                            <strong>{{ $dp->kriteria->kriteria ?? 'Kriteria' }}:</strong>
                                                            {{ $dp->skalaPenilaian->nama_s ?? 'N/A' }}
                                                         
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                            <p><strong>Saran/Komentar:</strong> {{ $p->saran_p ?? 'Tidak ada komentar.' }}
                                            </p>
                                            {{-- Tombol Edit dan Hapus jika user login adalah pemilik --}}
                                            @if (auth()->check() && auth()->id() == $p->user_id)
                                                <div class="mt-2">
                                                    
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal" data-bs-target="#deleteReviewModal"
                                                        onclick="setDeleteId({{ $p->id }})">
                                                        Hapus <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            @endif
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <p>Belum ada penilaian untuk destinasi ini.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal untuk Tambah Penilaian --}}
        @if (auth()->check())
            <div class="modal fade" id="addReviewModal" tabindex="-1" role="dialog" aria-labelledby="addReviewModalLabel"
                aria-hidden="true">

                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addReviewModalLabel">Tambah Penilaian untuk {{ $data->nama_w }}
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('review') }}" method="POST">
                            @csrf
                            <div class="modal-body">
                                {{-- Hidden field untuk wisata_id --}}
                                <input type="hidden" name="wisata_id" value="{{ $data->id }}">

                                {{-- Komentar/Saran --}}
                                <div class="form-group mb-3">
                                    <label for="saran_p">Komentar/Saran:</label>
                                    <textarea class="form-control" id="saran_p" name="saran_p" rows="3"
                                        placeholder="Tulis komentar Anda di sini..."></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="kriteria_id">Kriteria</label>
                                    <select class="form-control" name="kriteria_id" required>
                                        <option value="">Pilih Kriteria</option>
                                        @if (isset($kriteria))
                                            @foreach ($kriteria as $k)
                                                <option value="{{ $k->id }}">{{ $k->kriteria }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="skala_penilaian_id">Penilaian</label>
                                    <select class="form-control" name="skala_penilaian_id" required>
                                        <option value="">Pilih Penilaian</option>
                                        @if (isset($skala))
                                            @foreach ($skala as $s)
                                                <option value="{{ $s->id }}">{{ $s->nama_s }} </option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>


                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif


        {{-- Modal untuk Hapus Penilaian --}}
        @if (auth()->check())
            <div class="modal fade" id="deleteReviewModal" tabindex="-1" role="dialog"
                aria-labelledby="deleteReviewModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteReviewModalLabel">Hapus Penilaian</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Apakah Anda yakin ingin menghapus penilaian ini?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form action="" method="POST" id="deleteReviewForm" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
<script>
    // Fungsi untuk set ID hapus
    function setDeleteId(penilaianId) {
        // Asumsi route adalah 'review.destroy' dengan parameter id penilaian
        // Jika route berbeda, ganti sesuai (misal 'hapusreview')
        document.getElementById('deleteReviewForm').action = '{{ url("hapusreview") }}/' + penilaianId;
    }
</script>
@endsection

@section('scripts')

@endsection