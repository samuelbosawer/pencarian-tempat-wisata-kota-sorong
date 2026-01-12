@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder text-capitalize"><i class="menu-icon tf-icons bx bx-box"></i>
                            {{ $judul ?? 'Tambah Data Skala Penilaian' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'skala')
                                <form action="{{ route('dashboard.skala.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'skala')
                                    <form action="{{ route('dashboard.skala.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-8 mb-3">
                                    <label for="user_id" class="form-label">Nama User</label>
                                    <input type="text" class="form-control" id="user_id" name="user_id"
                                        value="{{ old('skala') ?? ($data->user->nama ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('user_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label for="wisata_id" class="form-label">Tempat Wisata</label>
                                    <input type="text" class="form-control" id="wisata_id" name="wisata_id"
                                        value="{{ old('wisata_id') ?? ($data->wisata->nama_w ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif>
                                    @error('wisata_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>



                                <div class="col-md-8 mb-3">
                                    <label for="saran_p" class="form-label">Saran</label>
                                    <textarea class="form-control" id="saran_p" name ="saran_p" rows="3"
                                        @if (Request::segment(3) == 'detail') disabled @endif>{{ old('saran_p') ?? ($data->saran_p ?? '') }}</textarea>
                                    @error('saran_p')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="col-md-8 mb-3">
                                    <p class="p-3 bg-primary text-white ">Detail Data Lainnya</p>
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label for="kriteria_id" class="form-label">Kriteria</label>

                                    <input type="text" class="form-control" id="kriteria_id"
                                        value="
        @if (isset($detail->kriteria)) {{ $detail->kriteria->kriteria }} ({{ $detail->kriteria->bobot }}) - {{ $detail->kriteria->jenis }}
        @else
            - @endif
        "
                                        disabled>
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label for="skala_penilaian_id" class="form-label">Skala Penilaian</label>

                                    <input type="text" class="form-control" id="skala_penilaian_id"
                                        value="
        @if (isset($detail->skalaPenilaian)) {{ $detail->skalaPenilaian->nama_s }} ({{ $detail->skalaPenilaian->nilai_s }})
        @else
            - @endif
        "
                                        disabled>
                                </div>






                            </div>
                            <div class="col-md-12 mb-3 mx-auto">


                                <a href="{{ route('dashboard.penilaian') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
