<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun - Aplikasi Pemilihan Tempat Wisata Kota Sorong</title>
   <!-- Bootstrap core CSS -->
    <link href="{{ asset('visitor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <!-- Google Fonts untuk font modern -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #2596be 0%, #0f4d64 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }
        .authentication-wrapper {
            width: 100%;
            max-width: 700px;
            padding: 20px;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            overflow: hidden;
        }
        .card-body {
            padding: 40px;
        }
        .logo-section {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo-section img {
            width: 200px;
            height: auto;
            margin-bottom: 15px;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        }
        .logo-section h3 {
            color: #333;
            font-weight: 700;
            font-size: 1.5rem;
            line-height: 1.3;
            margin: 0;
        }
        .welcome-text {
            text-align: center;
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 30px;
            line-height: 1.5;
        }
        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
        }
        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        .form-control:focus {
            border-color: #2596be;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
        }
        .input-group-text {
            border: 2px solid #e9ecef;
            border-left: none;
            background: #fff;
            border-radius: 0 12px 12px 0;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .input-group-text:hover {
            background: #f8f9fa;
        }
        .form-check-input:checked {
            background-color: #2596be;
            border-color: #2596be;
        }
        .btn-primary {
            background: linear-gradient(135deg, #2596be 0%, #0f4d64 100%);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.3);
        }
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(102, 126, 234, 0.4);
        }
        .text-danger {
            font-size: 0.85rem;
            margin-top: 5px;
        }
        .form-password-toggle {
            position: relative;
        }
        .input-group {
            position: relative;
        }
        .input-group input {
            border-right: none;
            border-radius: 12px 0 0 12px;
        }
        @media (max-width: 576px) {
            .card-body {
                padding: 30px 20px;
            }
            .logo-section h3 {
                font-size: 1.3rem;
            }
        }
    </style>

    <!-- Template CSS -->
    <script src="assets/js/vendors/color-modes.js"></script>
    <link href="assets/css/main.css?v=6.1" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="container-xxl mx-auto">
        <div class="authentication-wrapper authentication-basic mx-auto">
            <div class="authentication-inner">
                <!-- Login Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo Section -->
                        <div class="logo-section">
                            <img width="80px" class="p-3" src="{{ asset('assets/img/logo.png') }}" alt="Logo Aplikasi" srcset="">
                            <h3 class="fw-bold">Daftar Akun </h3>
                        </div>
                        <!-- /Logo Section -->
                        <p class="welcome-text">Silakan Isi Data Anda Dengan Benar</p>
                        
                        <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('daftarstore') }}">
                            @csrf

                              <div class="mb-3">
                                <label for="nama" class="form-label">Nama <span class="text-danger">*</span> </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nama"
                                    name="nama"
                                    placeholder="Masukkan nama"
                                    autofocus
                                    
                                />
                                @error('nama')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span> </label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Masukkan email"
                                    autofocus
                                    
                                />
                                @error('email')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                                <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir <span class="text-danger">*</span> </label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="tempat_lahir"
                                    name="tempat_lahir"
                                    placeholder="Masukkan tempat lahir"
                                    autofocus
                                    
                                />
                                @error('tempat_lahir')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir <span class="text-danger">*</span> </label>
                                <input
                                    type="date"
                                    class="form-control"
                                    id="tanggal_lahir"
                                    name="tanggal_lahir"
                                    placeholder="Masukkan tanggal lahir"
                                    autofocus
                                    
                                />
                                @error('tanggal_lahir')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat <span class="text-danger">*</span> </label>
                                     <textarea class="form-control" id="alamat" name ="alamat" rows="3"></textarea>
                                @error('alamat')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>





                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password <span class="text-danger">*</span> </label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password"
                                        class="form-control"
                                        name="password"
                                        placeholder="Masukkan password"
                                        aria-describedby="password"
                                        
                                    />
                                    <span class="input-group-text cursor-pointer" id="togglePassword">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                              <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password_confirmation">Konfirmasi Password <span class="text-danger">*</span> </label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input
                                        type="password"
                                        id="password_confirmation"
                                        class="form-control"
                                        name="password_confirmation"
                                        placeholder="Masukkan ulang password"
                                        aria-describedby="password_confirmation"
                                        
                                    />
                                    <span class="input-group-text cursor-pointer" id="togglePassword">
                                        <i class="bx bx-hide"></i>
                                    </span>
                                </div>
                                @error('password_confirmation')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <input type="text" name="role" value="{{ $id }}" hidden>
                            <div class="mb-3">
                                <div class="">
                                   Sudah punya akun ? <a href="{{ route('login') }}" class="text-decoration-none fw-bolder">Login</a>
                                </div>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Daftar</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- /Login Card -->
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Script untuk toggle password -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('bx-hide');
                icon.classList.add('bx-show');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('bx-show');
                icon.classList.add('bx-hide');
            }
        });
    </script>
</body>
</html>