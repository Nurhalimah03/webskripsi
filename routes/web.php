<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengajuanController;
use App\Models\PengajuanModel;
use Illuminate\Support\Facades\Auth;
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
/*Route Untuk Halaman Beranda*/

Auth::routes();


// Route::post('/logout');
Route::middleware(['auth'])->group(function () {

    Route::get('/', [BerandaController::class, 'index']);

    /*Route Untuk Halaman Pengajuan*/
    Route::get('/pengajuan', [PengajuanController::class, 'index'])->name('pengajuan');
    Route::get('/pengajuan/detail/{id}', [PengajuanController::class, 'detail']);
    Route::get('/pengajuan/create', [PengajuanController::class, 'add']);
    Route::post('/pengajuan/insert', [PengajuanController::class, 'insert']);
    Route::put('/pengajuan/destroy/{id}', [PengajuanController::class, 'destroy'])->name('pengajuan.destroy');
    Route::get('/pengajuan/edit/{id}', [PengajuanController::class, 'edit'])->name('pengajuan.edit');
    Route::post('/pengajuan/update/{id}', [PengajuanController::class, 'update'])->name('pengajuan.update');
    Route::get('/pengajuan/search', [PengajuanModel::class, 'search'])->name('pengajuan.search');
    // Pengajuan List
    Route::post('pengajuan/list', [PengajuanController::class, 'dtPengajuan'])->name('pengajuan.list');
    Route::post('pengajuanPdf', [PengajuanController::class, 'downloadPdf'])->name('pengajuanPdf');

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::post('chartPdf', [LaporanController::class, 'downloadPdf'])->name('chartPdf');

    /* Route untuk super admin */
    Route::middleware(['superadmin'])->group(function () {
        Route::get('/akun', [AdminController::class, 'index'])->name('akun');
        Route::get('/akun/create', [AdminController::class, 'add']);
        Route::post('/akun/insert', [AdminController::class, 'insert']);
        Route::put('/akun/destroy/{id}', [AdminController::class, 'destroy'])->name('akun.destroy');
        Route::get('/akun/detail/{id}', [AdminController::class, 'detail']);
        // Admin List
        Route::post('akun/list', [AdminController::class, 'dtAdmin'])->name('akun.list');
        // Route Untuk Register
        Route::get('/register', [RegisterController::class, 'create']);
    });

    Route::get('/contact', [ContactController::class, 'index']);

    /*Route Untuk LogIn */
    // Route::get('/', [LoginController::class, 'index']);
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
