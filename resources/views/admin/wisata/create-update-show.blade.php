@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder text-capitalize"><i class="menu-icon tf-icons bx bx-map-alt"></i>
                            {{ $judul ?? 'Tambah Data Wisata' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'wisata')
                                <form action="{{ route('dashboard.wisata.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'wisata')
                                    <form action="{{ route('dashboard.wisata.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-8 mb-3">
                                    <label for="nama_w" class="form-label">Nama Tempat</label>
                                    <input type="text" class="form-control" id="nama_w" name="nama_w"
                                        value="{{ old('nama_w') ?? ($data->nama_w ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('nama_w')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-8 mb-3">
                                    <label for="gambar_w" class="form-label">Gambar Cover (600x400)</label>

                                    {{-- Preview gambar --}}
                                    <div class="mb-2">
                                        <img id="preview-gambar"
                                            src="
        @if (isset($data) && $data->gambar_w && Storage::disk('public')->exists($data->gambar_w)) {{ asset('storage/' . $data->gambar_w) }}
        @elseif(isset($data) && $data->gambar_w && file_exists(public_path($data->gambar_w)))
            {{ asset($data->gambar_w) }}
        @else
            https://placehold.co/600x400?text=Gambar+Belum+Tersedia @endif
     "
                                            alt="Preview Gambar" class="img-thumbnail" style="max-width: 300px;">

                                    </div>

                                    {{-- Input file --}}
                                    <input type="hidden" name="gambar_w" id="gambarBase64">
                                    <input type="file" class="form-control" id="gambar_w" name=""
                                        accept="image/*" onchange="previewGambar(this)"
                                        @if (Request::segment(3) == 'detail') disabled @endif>

                                    @error('gambar_w')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-8 mb-3">
                                    <label for="kategori_wisata_id" class="form-label">Kategori Wisata</label>
                                    <select name="kategori_wisata_id" id="kategori_wisata_id" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>

                                        <option value="" hidden>Pilih Kategori</option>

                                        @foreach ($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}"
                                                @if (old('kategori_wisata_id') == $kategori->id || (isset($data) && $data->kategori_wisata_id == $kategori->id)) selected @endif>
                                                {{ $kategori->nama_ktg }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('kategori_wisata_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                <div class="col-md-8 mb-3">
                                    <label for="user_id" class="form-label">Pemilik / User</label>
                                    <select name="user_id" id="user_id" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>

                                        <option value="" hidden>Pilih User</option>

                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                @if (old('user_id') == $user->id || (isset($data) && $data->user_id == $user->id)) selected @endif>
                                                {{ $user->nama }} ({{ $user->email }})
                                            </option>
                                        @endforeach
                                    </select>

                                    @error('user_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>





                                <div class="col-md-8 mb-3">
                                    <label for="desk_w" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" id="desk_w" name ="desk_w" rows="3"
                                        @if (Request::segment(3) == 'detail') disabled @endif>{{ old('desk_w') ?? ($data->desk_w ?? '') }}</textarea>
                                    @error('desk_w')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>



                            </div>
                            <div class="col-md-12 mb-3 mx-auto">

                                @if (Auth::user()->hasAnyRole(['usaha']))
                                    @if (Request::segment(3) == 'detail')
                                        <a href="{{ route('dashboard.wisata.ubah', $data->id) }}"
                                            class="btn btn-dark text-white"> <i class="menu-icon tf-icons bx bx-pencil"></i>
                                            UBAH DATA </a>
                                    @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'wisata')
                                        <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                                class="menu-icon tf-icons bx bx-save"></i></button>
                                    @endif
                                @endif


                                <a href="{{ route('dashboard.wisata') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection

        @push('scripts')
            <script>
                function previewGambar(input) {
                    if (input.files && input.files[0]) {
                        const file = input.files[0];
                        const reader = new FileReader();

                        reader.onload = function(e) {
                            const img = new Image();
                            img.onload = function() {

                                // Canvas resize 600x400
                                const canvas = document.createElement('canvas');
                                const ctx = canvas.getContext('2d');
                                canvas.width = 600;
                                canvas.height = 400;

                                ctx.drawImage(img, 0, 0, 600, 400);

                                // Convert ke base64
                                const base64Image = canvas.toDataURL('image/jpeg', 0.9);

                                // Preview
                                document.getElementById('preview-gambar').src = base64Image;

                                // Simpan ke hidden input
                                document.getElementById('gambarBase64').value = base64Image;
                            };
                            img.src = e.target.result;
                        };

                        reader.readAsDataURL(file);
                    }
                }
            </script>
        @endpush
