<?php

use PhpParser\Node\Stmt\Foreach_;
use App\Models\KegiatanTahapanModel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FillDokumenController;
use App\Http\Controllers\ArsipDokumenController;
use App\Http\Controllers\PrintDokumenController;
use App\Http\Controllers\SopPelatihanController;
use App\Http\Controllers\StatusDokumenController;
use App\Http\Controllers\TinjauDokumenController;
use App\Http\Controllers\ArsipPelatihanController;
use App\Http\Controllers\JenisPelatihanController;
use App\Http\Controllers\ModelPelatihanController;
use App\Http\Controllers\BidangPelatihanController;
use App\Http\Controllers\JadwalPelatihanController;
use App\Http\Controllers\PelatihanStatusController;
use App\Http\Controllers\PelatihanBerlangsungController;

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

Route::middleware(['tamu'])->group(function () {
    Route::redirect('/', '/login');
    Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('revalidate');  
    Route::post('/login', [LoginController::class, 'signin']);
    
});

Route::get('/pelatihan-berlangsung', [PelatihanBerlangsungController::class, 'pelatihan_berlangsung'])->name('pelatihan-berlangsung');
Route::get('/pelatihan-berlangsung/slide-show', [PelatihanBerlangsungController::class, 'pelatihan_slides'])->name('pelatihan-berlangsung-slide-show');
Route::get('/pelatihan-berlangsung/cari-pelatihan', [PelatihanBerlangsungController::class, 'cari_pelatihanBerlangsung'])->name('cari-pelatihan-berlangsung');
// Route::get('/pelatihan/cek-status/{id}', [PelatihanController::class, 'pelatihan_cekStatus'])->name('pelatihan-cekStatus');
Route::get('/pelatihan/kelola-status/{id}', [PelatihanStatusController::class, 'pelatihan_kelolaStatus'])->name('pelatihan-kelolaStatus');

Route::get('/arsip-dokumen/unduh-{id_fl}', [ArsipDokumenController::class, 'unduh_dokumen'])->name('unduh-arsip-dokumen');

Route::get('/arsip-dokumen', [ArsipDokumenController::class, 'arsip_dokumen'])->name('arsip-dokumen');
Route::get('/arsip-dokumen/pelatihan-{id_pl}', [ArsipDokumenController::class, 'arsip_dokumen_pelatihan'])->name('arsip-dokumen-pelatihan');

Route::middleware(['admin'])->group(function () {
    Route::get('/kelola-jenis-pelatihan', [JenisPelatihanController::class, 'jenisPelatihan'])->name('kelola-jenis-pelatihan');
    Route::get('/kelola-jenis-pelatihan/tambah', [JenisPelatihanController::class, 'jenisPelatihan_tambah']);
    Route::post('/kelola-jenis-pelatihan/tambah', [JenisPelatihanController::class, 'jenisPelatihan_insert']);
    Route::get('/kelola-jenis-pelatihan/edit/{id}', [JenisPelatihanController::class, 'jenisPelatihan_edit']);
    Route::post('/kelola-jenis-pelatihan/edit/{id}', [JenisPelatihanController::class, 'jenisPelatihan_update']);
    Route::get('/kelola-jenis-pelatihan/hapus/{id}', [JenisPelatihanController::class, 'jenisPelatihan_delete']);

    Route::get('/kelola-bidang-pelatihan', [BidangPelatihanController::class, 'bidangPelatihan'])->name('kelola-bidang-pelatihan');
    Route::get('/kelola-bidang-pelatihan/tambah', [BidangPelatihanController::class, 'bidangPelatihan_tambah']);
    Route::post('/kelola-bidang-pelatihan/tambah', [BidangPelatihanController::class, 'bidangPelatihan_insert']);
    Route::get('/kelola-bidang-pelatihan/edit/{id}', [BidangPelatihanController::class, 'bidangPelatihan_edit']);
    Route::post('/kelola-bidang-pelatihan/edit/{id}', [BidangPelatihanController::class, 'bidangPelatihan_update']);
    Route::get('/kelola-bidang-pelatihan/hapus/{id}', [BidangPelatihanController::class, 'bidangPelatihan_delete']);

    Route::get('/kelola-model-pelatihan', [ModelPelatihanController::class, 'modelPelatihan'])->name('kelola-model-pelatihan');
    Route::get('/kelola-model-pelatihan/tambah', [ModelPelatihanController::class, 'modelPelatihan_tambah']);
    Route::post('/kelola-model-pelatihan/tambah', [ModelPelatihanController::class, 'modelPelatihan_insert']);
    Route::get('/kelola-model-pelatihan/edit/{id}', [ModelPelatihanController::class, 'modelPelatihan_edit']);
    Route::post('/kelola-model-pelatihan/edit/{id}', [ModelPelatihanController::class, 'modelPelatihan_update']);
    Route::get('/kelola-model-pelatihan/hapus/{id}', [ModelPelatihanController::class, 'modelPelatihan_delete']);

    Route::get('/jadwal-pelatihan/tambah', [JadwalPelatihanController::class, 'jadwalPelatihan_tambah']);
    Route::post('/jadwal-pelatihan/tambah', [JadwalPelatihanController::class, 'jadwalPelatihan_insert']);
    Route::get('/jadwal-pelatihan/detil/{id}', [JadwalPelatihanController::class, 'jadwalPelatihan_view']);
    Route::get('/jadwal-pelatihan/mulai/{id}', [JadwalPelatihanController::class, 'jadwalPelatihan_start']);
    Route::get('/jadwal-pelatihan/edit/{id}', [JadwalPelatihanController::class, 'jadwalPelatihan_edit']);
    Route::post('/jadwal-pelatihan/edit/{id}', [JadwalPelatihanController::class, 'jadwalPelatihan_update']);
    Route::get('/jadwal-pelatihan/hapus/{id}', [JadwalPelatihanController::class, 'jadwalPelatihan_delete']);

    Route::get('/pelatihan/hapus/{id}', [PelatihanBerlangsungController::class, 'pelatihan_delete'])->name('pelatihan-hapus');

    
});

Route::middleware('petugas')->group(function () {
    Route::get('/dokumen-pelatihan-{id_pl}/{no_thp}/tahapan-{id_thp}', [PelatihanBerlangsungController::class, 'menu_dokumen_pelatihan'])->name('dokumen-pelatihan');
    Route::get('/form-dokumen-pelatihan-{id_pl}/{id_kthp}', [FillDokumenController::class, 'form_dokumen_pelatihan'])->name('form-dokumen-pelatihan');

    $kegiatan_tahapan = KegiatanTahapanModel::all();
    foreach ($kegiatan_tahapan as $kegiatan) {
        $nama_dokumen = $kegiatan->dokumen;
        $nama_url = str_replace([' ', ', '], '-', $nama_dokumen);
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_dokumen);
        Route::post('/fill-dokumen-pelatihan-{id_pl}/{id_kthp}-'.$nama_url, [FillDokumenController::class, 'fill_'.$nama_fungsi])->name('fill-'.$nama_fungsi);
        Route::post('/print-dokumen-pelatihan-{id_pl}/{id_kthp}-'.$nama_url, [PrintDokumenController::class, 'print_'.$nama_fungsi])->name('print-'.$nama_fungsi);
    }

    Route::get('/status-dokumen', [StatusDokumenController::class, 'status_dokumen'])->name('status-dokumen');
    Route::post('/status-dokumen/cari-dokumen-terkirim', [StatusDokumenController::class, 'cari_dokumen_terkirim'])->name('cari-dokumen-terkirim');
    Route::post('/status-dokumen/cari-dokumen-disetujui', [StatusDokumenController::class, 'cari_dokumen_disetujui'])->name('cari-dokumen-disetujui');
    Route::post('/status-dokumen/cari-dokumen-ditolak', [StatusDokumenController::class, 'cari_dokumen_ditolak'])->name('cari-dokumen-ditolak');
});

Route::middleware('supervisi')->group(function () {
    Route::get('/tinjau-dokumen', [TinjauDokumenController::class, 'tinjau_dokumen'])->name('tinjau-dokumen');
    Route::get('/tinjau-dokumen/setujui-{id_fl}', [TinjauDokumenController::class, 'setujui_dokumen'])->name('setujui-dokumen');
    Route::get('/tinjau-dokumen/unduh-{id_fl}', [TinjauDokumenController::class, 'unduh_dokumen'])->name('unduh-dokumen');

});

Route::middleware(['all-role'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('/sop-pelatihan', [SopPelatihanController::class, 'sopPelatihan'])->name('sop-pelatihan');

    Route::get('/jadwal-pelatihan', [JadwalPelatihanController::class, 'jadwalPelatihan'])->name('jadwal-pelatihan');

    Route::get('/pelatihan/{id_pl}/ceklis-status/{id_kg}', [PelatihanStatusController::class, 'pelatihan_ceklisStatus']);

    Route::get('/cetak-progres/pelatihan-{id}', [PelatihanBerlangsungController::class, 'progress_pelatihan'])->name('cetak-progres-pelatihan');

    Route::get('/arsip-pelatihan', [ArsipPelatihanController::class, 'arsip_pelatihan'])->name('arsip-pelatihan');
    Route::get('/arsip-pelatihan/cari-pelatihan', [ArsipPelatihanController::class, 'cari_arsipPelatihan'])->name('cari-arsip-pelatihan');
 
});