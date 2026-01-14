<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <title>Wisata Kota Sorong</title>

    <!-- Paksa Light Mode -->
    <meta name="color-scheme" content="only light">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('visitor/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('visitor/assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/assets/css/templatemo-woox-travel.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('visitor/assets/css/animate.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo.png') }}" />
    <style>
        @media (prefers-color-scheme: dark) {
            body {
                background: #ffffff !important;
                color: #000000 !important;
            }
        }
    </style>
</head>

<body>
    @include('sweetalert::alert')
    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->
