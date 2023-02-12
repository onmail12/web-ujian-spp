<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/', [LoginController::class, 'logout'])->name('logout');

Route::resource('siswa', SiswaController::class)->middleware('admin');

Route::get('/pembayaran', [TransaksiController::class, 'index'])->name('pembayaran.index')->middleware(['admin', 'petugas']);
Route::post('/pembayaran/{siswa}', [TransaksiController::class, 'create'])->name('pembayaran.create')->middleware(['admin', 'petugas']);
Route::get('/histori', [TransaksiController::class, 'index_histori'])->name('histori')->middleware('auth');

