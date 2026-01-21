<?php

use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tentang', [App\Http\Controllers\HomeController::class, 'tentang'])->name('tentang');
Route::get('/tempat-wisata', [App\Http\Controllers\HomeController::class, 'wisata'])->name('wisata');
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::get('/rekomendasi', [App\Http\Controllers\HomeController::class, 'rekomendasi'])->name('rekomendasi');
Route::get('/daftar', [App\Http\Controllers\HomeController::class, 'daftar'])->name('daftar');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/kategori', [App\Http\Controllers\HomeController::class, 'kategori'])->name('kategori');
Route::get('/kategori/{id}', [App\Http\Controllers\HomeController::class, 'kategori_detail'])->name('kategori.detail');
Route::get('/daftar/pilih/{id}', [App\Http\Controllers\HomeController::class, 'daftarpilih'])->name('daftarpilih');
Route::post('/daftar/store', [App\Http\Controllers\HomeController::class, 'daftarstore'])->name('daftarstore');
Route::post('/review/store', [App\Http\Controllers\HomeController::class, 'review'])->name('review');
Route::put('/review/update{id}', [App\Http\Controllers\HomeController::class, 'review_edit'])->name('review_edit');
Route::delete('/hapusreview/{id}', [App\Http\Controllers\HomeController::class, 'hapusreview'])->name('hapusreview');

require_once 'admin.php';
