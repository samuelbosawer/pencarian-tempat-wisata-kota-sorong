<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tentang', [App\Http\Controllers\HomeController::class, 'tentang'])->name('tentang');
Route::get('/wisata', [App\Http\Controllers\HomeController::class, 'wisata'])->name('wisata');
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::get('/rekomendasi', [App\Http\Controllers\HomeController::class, 'rekomendasi'])->name('rekomendasi');
Route::get('/daftar', [App\Http\Controllers\HomeController::class, 'daftar'])->name('daftar');
Route::post('/daftar/store', [App\Http\Controllers\HomeController::class, 'daftarstore'])->name('daftarstore');
Route::post('/review/store', [App\Http\Controllers\HomeController::class, 'review'])->name('review');

require_once 'admin.php';
