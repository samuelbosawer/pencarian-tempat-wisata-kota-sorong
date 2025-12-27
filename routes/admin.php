<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::group(['middleware' => ['auth']], function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {

        // Dashboard
        Route::get('/', [DashboardController::class, 'index'])->name('home');


     
        require_once 'admin/kategori.php';
        require_once 'admin/kriteria.php';
        require_once 'admin/penilaian.php';
        require_once 'admin/rekomendasi.php';
        require_once 'admin/skala.php';
        require_once 'admin/user.php';
        require_once 'admin/wisata.php';
       
    });
});
