<?php

use App\Http\Controllers\Admin\PenilaianController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(PenilaianController::class)->group(function(){
        Route::get('penilaian', [PenilaianController::class, 'index'])->name('penilaian');
        Route::get('penilaian/tambah', [PenilaianController::class, 'create'])->name('penilaian.tambah')->middleware(['auth','role.custom:pengunjung']);
        Route::get('penilaian/detail/{id}', [PenilaianController::class, 'show'])->name('penilaian.detail');
        Route::delete('penilaian/{id}', [PenilaianController::class, 'destroy'])->name('penilaian.hapus')->middleware(['auth','role.custom:pengunjung|admin']);
        Route::post('penilaian/store', [PenilaianController::class, 'store'])->name('penilaian.store')->middleware(['auth','role.custom:pengunjung']);
        Route::get('penilaian/{id}/ubah', [PenilaianController::class, 'edit'])->name('penilaian.ubah')->middleware(['auth','role.custom:pengunjung']);
        Route::put('penilaian/{id}', [PenilaianController::class, 'update'])->name('penilaian.update')->middleware(['auth','role.custom:pengunjung']);
    });
});
