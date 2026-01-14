@extends('visitor.layout.tamplate')

@section('content')

<style>
    /* Custom styles with primary color #2596be */
    .profile-page {
        background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
        padding: 60px 0;
    }
    .profile-header {
        background: white;
        color: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin-bottom: 40px;
        text-align: center;
    }
    .profile-header h2 {
        margin-bottom: 10px;
    }
    .profile-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        padding: 40px;
        margin-bottom: 40px;
    }
    .profile-info {
        list-style: none;
        padding: 0;
    }
    .profile-info li {
        background: #f8f9fa;
        margin-bottom: 15px;
        padding: 20px;
        border-radius: 10px;
        border-left: 5px solid #d1d1d1;
        display: flex;
        justify-content: space-between;
        align-items: center;
        transition: background 0.3s ease;
    }
    .profile-info li:hover {
        background: #e9ecef;
    }
    .profile-info .label {
        font-weight: bold;
      
    }
    .profile-info .value {
        color: #333;
    }
    .edit-button {

        border: none;
        color: white;
        padding: 12px 25px;
        border-radius: 25px;
        text-decoration: none;
        display: inline-block;
        transition: background 0.3s ease;
    }
    .edit-button:hover {
      
        color: white;
        text-decoration: none;
    }
    /* Responsive adjustments */
    @media (max-width: 768px) {
        .profile-header, .profile-card {
            padding: 20px;
        }
        .profile-info li {
            flex-direction: column;
            align-items: flex-start;
        }
        .profile-info li .label, .profile-info li .value {
            margin-bottom: 5px;
        }
    }
</style>

<div class="profile-page">
    <div class="container">
        <!-- PROFILE HEADER -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8">
                <div class="profile-header">
                    <h2 class="fw-bold">Profil Pengguna</h2>
                    {{-- <p>Selamat datang di halaman profil Anda. Kelola informasi pribadi Anda di sini.</p> --}}
                </div>
            </div>
        </div>

        <!-- PROFILE INFO -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="profile-card">
                    <h4 class="mb-4 ">Informasi Pribadi</h4>
                    <ul class="profile-info">
                        <li>
                            <span class="label">Nama:</span>
                            <span class="value">{{ auth()->user()->nama ?? 'Tidak tersedia' }}</span>
                        </li>
                        <li>
                            <span class="label">Email:</span>
                            <span class="value">{{ auth()->user()->email ?? 'Tidak tersedia' }}</span>
                        </li>
                        <li>
                            <span class="label">Alamat:</span>
                            <span class="value">{{ auth()->user()->alamat ?? 'Tidak tersedia' }}</span>
                        </li>
                        <li>
                            <span class="label">Tempat Lahir:</span>
                            <span class="value">{{ auth()->user()->tempat_lahir ?? 'Tidak tersedia' }}</span>
                        </li>
                        <li>
                            <span class="label">Tanggal Lahir:</span>
                            <span class="value">{{ auth()->user()->tanggal_lahir ? \Carbon\Carbon::parse(auth()->user()->tanggal_lahir)->format('d M Y') : 'Tidak tersedia' }}</span>
                        </li>
                    </ul>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection