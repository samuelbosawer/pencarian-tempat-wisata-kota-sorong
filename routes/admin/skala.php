<?php

use App\Http\Controllers\Admin\SkalaPenilaianController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role.custom:admin']], function () {

    Route::controller(SkalaPenilaianController::class)->group(function () {
        Route::get('skala', 'index')->name('skala');
        Route::get('skala/tambah', 'create')->name('skala.tambah');
        Route::get('skala/detail/{id}', 'show')->name('skala.detail');
        Route::delete('skala/{id}', 'destroy')->name('skala.hapus');
        Route::post('skala/store', 'store')->name('skala.store');
        Route::get('skala/{id}/ubah', 'edit')->name('skala.ubah');
        Route::put('skala/{id}', 'update')->name('skala.update');
    });

});

