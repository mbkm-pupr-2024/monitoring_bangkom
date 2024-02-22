<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\ManajemenDataController;

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


    Route::get('/sop-pelatihan', [ManajemenDataController::class, 'sopPelatihan'])->name('sop-pelatihan');
    // Route::get('/sop-pelatihan/tambah', [ManajemenDataController::class, 'sopPelatihan_tambah']);
    // Route::post('/sop-pelatihan/tambah', [ManajemenDataController::class, 'sopPelatihan_insert']);
    // Route::get('/sop-pelatihan/edit/{id}', [ManajemenDataController::class, 'sopPelatihan_edit'])->name('sop-pelatihan-edit');
    // Route::post('/sop-pelatihan/edit/{id}', [ManajemenDataController::class, 'sopPelatihan_update']);
    // Route::get('/sop-pelatihan/hapus/{id}', [ManajemenDataController::class, 'sopPelatihan_delete']);

    Route::get('/kelola-jenis-pelatihan', [ManajemenDataController::class, 'jenisPelatihan'])->name('kelola-jenis-pelatihan');
    Route::get('/kelola-jenis-pelatihan/tambah', [ManajemenDataController::class, 'jenisPelatihan_tambah']);
    Route::post('/kelola-jenis-pelatihan/tambah', [ManajemenDataController::class, 'jenisPelatihan_insert']);
    Route::get('/kelola-jenis-pelatihan/edit/{id}', [ManajemenDataController::class, 'jenisPelatihan_edit']);
    Route::post('/kelola-jenis-pelatihan/edit/{id}', [ManajemenDataController::class, 'jenisPelatihan_update']);
    Route::get('/kelola-jenis-pelatihan/hapus/{id}', [ManajemenDataController::class, 'jenisPelatihan_delete']);

    Route::get('/kelola-bidang-pelatihan', [ManajemenDataController::class, 'bidangPelatihan'])->name('kelola-bidang-pelatihan');
    Route::get('/kelola-bidang-pelatihan/tambah', [ManajemenDataController::class, 'bidangPelatihan_tambah']);
    Route::post('/kelola-bidang-pelatihan/tambah', [ManajemenDataController::class, 'bidangPelatihan_insert']);
    Route::get('/kelola-bidang-pelatihan/edit/{id}', [ManajemenDataController::class, 'bidangPelatihan_edit']);
    Route::post('/kelola-bidang-pelatihan/edit/{id}', [ManajemenDataController::class, 'bidangPelatihan_update']);
    Route::get('/kelola-bidang-pelatihan/hapus/{id}', [ManajemenDataController::class, 'bidangPelatihan_delete']);

    Route::get('/kelola-model-pelatihan', [ManajemenDataController::class, 'modelPelatihan'])->name('kelola-model-pelatihan');
    Route::get('/kelola-model-pelatihan/tambah', [ManajemenDataController::class, 'modelPelatihan_tambah']);
    Route::post('/kelola-model-pelatihan/tambah', [ManajemenDataController::class, 'modelPelatihan_insert']);
    Route::get('/kelola-model-pelatihan/edit/{id}', [ManajemenDataController::class, 'modelPelatihan_edit']);
    Route::post('/kelola-model-pelatihan/edit/{id}', [ManajemenDataController::class, 'modelPelatihan_update']);
    Route::get('/kelola-model-pelatihan/hapus/{id}', [ManajemenDataController::class, 'modelPelatihan_delete']);


    Route::get('/jadwal-pelatihan', [PelatihanController::class, 'jadwalPelatihan'])->name('jadwal-pelatihan');
    Route::get('/jadwal-pelatihan/tambah', [PelatihanController::class, 'jadwalPelatihan_tambah']);
    Route::post('/jadwal-pelatihan/tambah', [PelatihanController::class, 'jadwalPelatihan_insert']);
    Route::get('/jadwal-pelatihan/mulai/{id}', [PelatihanController::class, 'jadwalPelatihan_start']);
    Route::get('/jadwal-pelatihan/edit/{id}', [PelatihanController::class, 'jadwalPelatihan_edit']);
    Route::post('/jadwal-pelatihan/edit/{id}', [PelatihanController::class, 'jadwalPelatihan_update']);
    Route::get('/jadwal-pelatihan/hapus/{id}', [PelatihanController::class, 'jadwalPelatihan_delete']);
    
    Route::get('/pelatihan/hapus/{id}', [PelatihanController::class, 'pelatihan_delete'])->name('pelatihan-hapus');

    Route::get('/pelatihan/{id_pl}/ceklis-status/{id_kg}', [PelatihanController::class, 'pelatihan_ceklisStatus']);
    Route::get('/arsip-pelatihan', [PelatihanController::class, 'arsip_pelatihan'])->name('arsip-pelatihan');
});
Route::get('/cetak-surat', [SuratController::class, 'index'])->name('cetak-surat');
Route::get('/cetak-surat/{id}', [SuratController::class, 'report_progress'])->name('cetak-surat-download');

Route::get('/excell', [SuratController::class, 'excel']);
Route::post('/excell', [SuratController::class, 'import'])->name('upload-excel');

