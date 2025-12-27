<?php

use App\Http\Controllers\Admin\KategoriController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth']], function () {

    Route::controller(KategoriController::class)->group(function(){
        Route::get('kategori', [KategoriController::class, 'index'])->name('kategori');
        Route::get('kategori/tambah', [KategoriController::class, 'create'])->name('kategori.tambah');
        Route::get('kategori/detail/{id}', [KategoriController::class, 'show'])->name('kategori.detail');
        Route::delete('kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.hapus');
        Route::post('kategori/store', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('kategori/{id}/ubah', [KategoriController::class, 'edit'])->name('kategori.ubah');
        Route::put('kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    });
});
