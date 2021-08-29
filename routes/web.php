<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PengajuanController;
use Illuminate\Support\Facades\Route;

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
/*Route Untuk Halaman Beranda*/
Route::get('/', [BerandaController::class, 'index']);


/*Route Untuk Halaman Pengajuan*/
Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
Route::get('/pengajuan/detail/{id}', [PengajuanController::class, 'detail']);
Route::get('/pengajuan/create', [PengajuanController::class, 'add']);
Route::post('/pengajuan/insert', [PengajuanController::class, 'insert']);

Route::get('/laporan', function () {
    return view('pengajuan.laporan');
});

/* Route untuk admin */
Route::get('/akun', [AdminController::class, 'index'])->name('akun');
Route::get('/akun/detail/{id}', [AdminController::class, 'detail']);
Route::get('/akun/create', [AdminController::class, 'add']);
Route::post('/akun/insert', [AdminController::class, 'insert']);

/* Route Untuk Halaman Contact*/
Route::get('/contact',[ContactController::class, 'index']);
