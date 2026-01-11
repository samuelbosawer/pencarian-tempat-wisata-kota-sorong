@extends('admin.layout.tamplate')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- <h4 class="text-muted py-3 mb-4"><a href="/{{ Request::segment(1).'/'.Request::segment(2) }}" class=" fw-light">{{  Request::segment(2) }}</a> </h4> --}}

        <div class="row ">
            <div class="col-12">
                <div class="row">
                    <div class="card mb-4">
                        <h5 class="card-header fw-bolder text-capitalize"><i class="menu-icon tf-icons bx bx-collection"></i>
                            {{ $judul ?? 'Tambah Data Kriteria' }} </h5>
                        <div class="card-body">

                            @if (Request::segment(4) == 'ubah' && Request::segment(2) == 'kriteria')
                                <form action="{{ route('dashboard.kriteria.update', $data->id) }}" enctype="multipart/form-data"
                                    method="POST">
                                    @csrf
                                    @method('PUT')
                                @elseif (Request::segment(3) == 'tambah' && Request::segment(2) == 'kriteria')
                                    <form action="{{ route('dashboard.kriteria.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                    @else
                                        <form action="">
                            @endif

                            <div class="row">

                                <div class="col-md-8 mb-3">
                                    <label for="kriteria" class="form-label">Nama Kriteria</label>
                                    <input type="text" class="form-control" id="kriteria" name="kriteria"
                                        value="{{ old('kriteria') ?? ($data->kriteria ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif
                                        >
                                    @error('kriteria')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                 <div class="col-md-8 mb-3">
                                    <label for="bobot" class="form-label">Bobot</label>
                                    <input type="text" class="form-control" id="bobot" name="bobot"
                                        value="{{ old('bobot') ?? ($data->bobot ?? '') }}"
                                        @if (Request::segment(3) == 'detail') disabled @endif
                                        >
                                    @error('bobot')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>


                                 <div class="col-md-8 mb-3">
                                    <label for="jenis" class="form-label">Jenis</label>
                                    <select name="jenis" id="jenis" class="form-select"
                                        @if (Request::segment(3) == 'detail') disabled @endif>

                                        <option value="" hidden>Pilih Kategori</option>

                                            <option value="benefit"
                                                @if (old('jenis') == 'benefit' || (isset($data) && $data->jenis == 'benefit')) selected @endif>
                                                Benefit
                                            </option>


                                              <option value="cost"
                                                @if (old('jenis') == 'cost' || (isset($data) && $data->jenis == 'cost')) selected @endif>
                                                Cost
                                            </option>
                                    </select>

                                    @error('jenis')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>






                            </div>
                            <div class="col-md-12 mb-3 mx-auto">


                                    @if (Request::segment(3) == 'detail')
                                        <a href="{{ route('dashboard.kriteria.ubah', $data->id) }}"
                                            class="btn btn-dark text-white"> <i class="menu-icon tf-icons bx bx-pencil"></i>
                                            UBAH DATA </a>
                                    @elseif ((Request::segment(3) == 'tambah' || Request::segment(4) == 'ubah') && Request::segment(2) == 'kriteria')
                                        <button type="submit" class="btn btn-primary text-white">SIMPAN <i
                                                class="menu-icon tf-icons bx bx-save"></i></button>
                                    @endif

                                <a href="{{ route('dashboard.kategori') }}" class="btn btn-dark text-white"> KEMBALI </a>

                            </div>


                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endsection
