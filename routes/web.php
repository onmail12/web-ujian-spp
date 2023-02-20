<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('user.store');
Route::post('/', [LoginController::class, 'logout'])->name('logout');

Route::resource('kelas', KelasController::class)->middleware('admin');
Route::resource('siswa', SiswaController::class)->middleware('admin');

// resource route (resource) problem on route model binding
Route::get('/pembayaran', [TransaksiController::class, 'index'])->name('pembayaran.index')->middleware(['admin', 'petugas']);
Route::post('/pembayaran/{siswa}', [TransaksiController::class, 'store'])->name('pembayaran.store')->middleware(['admin', 'petugas']);
Route::get('/histori', [TransaksiController::class, 'index_histori'])->name('histori')->middleware('auth');

Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
Route::post('/profile', [UserController::class, 'update'])->name('profile.update');
