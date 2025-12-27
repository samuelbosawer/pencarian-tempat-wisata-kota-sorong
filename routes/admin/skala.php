<?php

use App\Http\Controllers\Admin\SkalaPenilaianController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(SkalaPenilaianController::class)->group(function(){
        Route::get('skala', [SkalaPenilaianController::class, 'index'])->name('skala');
        Route::get('skala/tambah', [SkalaPenilaianController::class, 'create'])->name('skala.tambah');
        Route::get('skala/detail/{id}', [SkalaPenilaianController::class, 'show'])->name('skala.detail');
        Route::delete('skala/{id}', [SkalaPenilaianController::class, 'destroy'])->name('skala.hapus');
        Route::post('skala/store', [SkalaPenilaianController::class, 'store'])->name('skala.store');
        Route::get('skala/{id}/ubah', [SkalaPenilaianController::class, 'edit'])->name('skala.ubah');
        Route::put('skala/{id}', [SkalaPenilaianController::class, 'update'])->name('skala.update');
    });
});
