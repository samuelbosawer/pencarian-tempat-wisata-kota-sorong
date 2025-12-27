<?php

use App\Http\Controllers\Admin\TempatWisataController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(TempatWisataController::class)->group(function(){
        Route::get('wisata', [TempatWisataController::class, 'index'])->name('wisata');
        Route::get('wisata/tambah', [TempatWisataController::class, 'create'])->name('wisata.tambah');
        Route::get('wisata/detail/{id}', [TempatWisataController::class, 'show'])->name('wisata.detail');
        Route::delete('wisata/{id}', [TempatWisataController::class, 'destroy'])->name('wisata.hapus');
        Route::post('wisata/store', [TempatWisataController::class, 'store'])->name('wisata.store');
        Route::get('wisata/{id}/ubah', [TempatWisataController::class, 'edit'])->name('wisata.ubah');
        Route::put('wisata/{id}', [TempatWisataController::class, 'update'])->name('wisata.update');
    });
});
