@extends('admin.layout.tamplate')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">

    {{-- ================= MATRICS KEPUTUSAN ================= --}}
    <div class="card mb-4">
        <h5 class="card-header bg-primary text-white">
            Matriks Keputusan (X)
        </h5>
        <div class="table-responsive p-3">
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>Wisata</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($X as $wisataId => $nilaiKriteria)
                        <tr>
                            <td class="fw-bold">
                                {{ $wisatas->firstWhere('id', $wisataId)->nama_w }}
                            </td>
                            @foreach ($kriterias as $kriteria)
                                <td>
                                    {{ number_format($nilaiKriteria[$kriteria->id] ?? 0, 3) }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- ================= NORMALISASI ================= --}}
    <div class="card mb-4">
        <h5 class="card-header bg-primary text-white">
            Matriks Normalisasi
        </h5>
        <div class="table-responsive p-3">
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>Wisata</th>
                        @foreach ($kriterias as $kriteria)
                            <th>{{ $kriteria->kriteria }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($normalisasi as $wisataId => $nilaiKriteria)
                        <tr>
                            <td class="fw-bold">
                                {{ $wisatas->firstWhere('id', $wisataId)->nama_w }}
                            </td>
                            @foreach ($kriterias as $kriteria)
                                <td>
                                    {{ number_format($nilaiKriteria[$kriteria->id] ?? 0, 4) }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- ================= NORMALISASI TERBOBOT ================= --}}
    <div class="card mb-4">
        <h5 class="card-header bg-primary text-white">
            Matriks Normalisasi Terbobot
        </h5>
        <div class="table-responsive p-3">
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>Wisata</th>
                        @foreach ($kriterias as $kriteria)
                            <th>
                                {{ $kriteria->kriteria }} <br>
                                <small class="text-muted">(Bobot {{ $kriteria->bobot }})</small>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($terbobot as $wisataId => $nilaiKriteria)
                        <tr>
                            <td class="fw-bold">
                                {{ $wisatas->firstWhere('id', $wisataId)->nama_w }}
                            </td>
                            @foreach ($kriterias as $kriteria)
                                <td>
                                    {{ number_format($nilaiKriteria[$kriteria->id] ?? 0, 4) }}
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- ================= NILAI OPTIMASI ================= --}}
    <div class="card mb-4">
        <h5 class="card-header bg-primary text-white">
            Nilai Optimasi (Yi)
        </h5>
        <div class="table-responsive p-3">
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>Wisata</th>
                        <th>Nilai Yi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($yi as $wisataId => $nilai)
                        <tr>
                            <td class="fw-bold">
                                {{ $wisatas->firstWhere('id', $wisataId)->nama_w }}
                            </td>
                            <td>{{ number_format($nilai, 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- ================= RANKING ================= --}}
    <div class="card mb-4">
        <h5 class="card-header bg-success text-white">
            Hasil Ranking MOORA
        </h5>
        <div class="table-responsive p-3">
            <table class="table table-bordered text-center">
                <thead class="table-light">
                    <tr>
                        <th>Ranking</th>
                        <th>Nama Wisata</th>
                        <th>Nilai Yi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ranking as $row)
                        <tr>
                            <td class="fw-bold">{{ $row['ranking'] }}</td>
                            <td>{{ $row['wisata']->nama_w }}</td>
                            <td>{{ number_format($row['nilai'], 4) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
