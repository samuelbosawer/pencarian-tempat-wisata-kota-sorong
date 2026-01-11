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
                                    <label for="nama_s" class="form-label">Nama Skala</label>
                                    <input type="text" class="form-control" id="nama_s" name="nama_s"
                                        value="{{ old('skala') ?? ($data->nama_s ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif
                                        >
                                    @error('nama_s')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                 <div class="col-md-8 mb-3">
                                    <label for="nilai_s" class="form-label">Nilai Skala</label>
                                    <input type="text" class="form-control" id="nilai_s" name="nilai_s"
                                        value="{{ old('nilai_s') ?? ($data->nilai_s ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif
                                        >
                                    @error('nilai_s')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>




                            </div>
                            <div class="col-md-12 mb-3 mx-auto">


                                    @if (Request::segment(3) == 'detail')
                                        <a href="{{ route('dashboard.skala.ubah', $data->id) }}"
                                            class="btn btn-dark text-white"> <i class="menu-icon tf-icons bx bx-pencil"></i>
                                            UBAH DATA </a>
                                    @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'skala')
                                        <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                                class="menu-icon tf-icons bx bx-save"></i></button>
                                    @endif

                                <a href="{{ route('dashboard.skala') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
