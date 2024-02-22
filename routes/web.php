<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\DataPelatihanController;
use App\Http\Controllers\SuratController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::redirect('/', '/login');
Route::middleware('tamu')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('login');   
    Route::post('/login', [LoginController::class, 'signin']);
});

Route::get('/pelatihan-berlangsung', [PelatihanController::class, 'pelatihan_berlangsung'])->name('pelatihan-berlangsung');
Route::get('/pelatihan/status/{id}', [PelatihanController::class, 'pelatihan_status'])->name('pelatihan-status');

Route::middleware('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('/sop-pelatihan', [DataPelatihanController::class, 'sopPelatihan'])->name('sop-pelatihan');
    // Route::get('/sop-pelatihan/tambah', [DataPelatihanController::class, 'sopPelatihan_tambah']);
    // Route::post('/sop-pelatihan/tambah', [DataPelatihanController::class, 'sopPelatihan_insert']);
    // Route::get('/sop-pelatihan/edit/{id}', [DataPelatihanController::class, 'sopPelatihan_edit'])->name('sop-pelatihan-edit');
    // Route::post('/sop-pelatihan/edit/{id}', [DataPelatihanController::class, 'sopPelatihan_update']);
    // Route::get('/sop-pelatihan/hapus/{id}', [DataPelatihanController::class, 'sopPelatihan_delete']);


    // Route::get('/kegiatan-pelatihan/tambah/{sop}', [DataPelatihanController::class, 'kegiatanPelatihan_tambah'])->name('kegiatanpelatihan-tambah');
    // Route::post('/kegiatan-pelatihan/tambah', [DataPelatihanController::class, 'kegiatanPelatihan_insert']);
    // Route::get('/kegiatan-pelatihan/edit/{id}', [DataPelatihanController::class, 'kegiatanPelatihan_edit'])->name('kegiatanpelatihan-edit');
    // Route::post('/kegiatan-pelatihan/edit/{id}', [DataPelatihanController::class, 'kegiatanPelatihan_update']);
    // Route::get('/kegiatan-pelatihan/hapus/{id}', [DataPelatihanController::class, 'kegiatanPelatihan_delete'])->name('kegiatanpelatihan-hapus');


    Route::get('/jadwal-pelatihan', [DataPelatihanController::class, 'jadwalPelatihan'])->name('jadwal-pelatihan');
    Route::get('/jadwal-pelatihan/tambah', [DataPelatihanController::class, 'jadwalPelatihan_tambah']);
    Route::post('/jadwal-pelatihan/tambah', [DataPelatihanController::class, 'jadwalPelatihan_insert']);
    Route::get('/jadwal-pelatihan/edit/{id}', [DataPelatihanController::class, 'jadwalPelatihan_edit']);
    Route::post('/jadwal-pelatihan/edit/{id}', [DataPelatihanController::class, 'jadwalPelatihan_update']);
    Route::get('/jadwal-pelatihan/hapus/{id}', [DataPelatihanController::class, 'jadwalPelatihan_delete']);
    
    // Route::get('/pelatihan-tambah', [PelatihanController::class, 'pelatihan_tambah'])->name('pelatihan-tambah');
    // Route::post('/pelatihan-tambah', [PelatihanController::class, 'pelatihan_insert']);
    Route::get('/pelatihan/edit/{id}', [PelatihanController::class, 'pelatihan_edit'])->name('pelatihan-edit');
    Route::post('/pelatihan/edit/{id}', [PelatihanController::class, 'pelatihan_update']);
    Route::get('/pelatihan/hapus/{id}', [PelatihanController::class, 'pelatihan_delete'])->name('pelatihan-hapus');

    Route::get('/pelatihan/{id_pl}/ceklis-status/{id_kg}', [PelatihanController::class, 'pelatihan_ceklisStatus']);
    Route::get('/arsip-pelatihan', [PelatihanController::class, 'arsip_pelatihan'])->name('arsip-pelatihan');
});
Route::get('/cetak-surat', [SuratController::class, 'index'])->name('cetak-surat');
Route::get('/cetak-surat/{id}', [SuratController::class, 'report_progress'])->name('cetak-surat-download');

Route::get('/excell', [SuratController::class, 'excel']);
Route::post('/excell', [SuratController::class, 'import'])->name('upload-excel');

