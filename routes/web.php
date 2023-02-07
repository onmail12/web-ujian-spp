<?php

use App\Http\Controllers\SiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->middleware('auth');
Route::post('/', [LoginController::class, 'logout'])->name('logout');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index')->middleware('admin');
Route::post('/siswa', [SiswaController::class, 'create'])->name('siswa.create');
Route::get('/update_siswa/{siswa}', [SiswaController::class, 'index_update'])->name('siswa.index.update');
Route::post('/siswa', [SiswaController::class, 'update'])->name('siswa.update');

Route::get('/pembayaran', [TransaksiController::class, 'index'])->name('pembayaran.index')->middleware(['admin', 'petugas']);
Route::post('/pembayaran/{siswa}', [TransaksiController::class, 'create'])->name('pembayaran.create')->middleware(['admin', 'petugas']);

Route::get('/histori', [TransaksiController::class, 'index_histori'])->name('histori')->middleware('auth');
