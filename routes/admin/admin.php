<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['auth', 'role.custom:admin']], function () {
    Route::controller(AdminController::class)->group(function(){
        Route::get('admin', [AdminController::class, 'index'])->name('admin');
        Route::get('admin/tambah', [AdminController::class, 'create'])->name('admin.tambah');
        Route::get('admin/detail/{id}', [AdminController::class, 'show'])->name('admin.detail');
        Route::delete('admin/{id}', [AdminController::class, 'destroy'])->name('admin.hapus');
        Route::post('admin/store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('admin/{id}/ubah', [AdminController::class, 'edit'])->name('admin.ubah');
        Route::put('admin/{id}', [AdminController::class, 'update'])->name('admin.update');
    });
});
