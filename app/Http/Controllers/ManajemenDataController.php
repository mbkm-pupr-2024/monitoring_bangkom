<?php

namespace App\Http\Controllers;

use App\Models\SopModel;
use Illuminate\Http\Request;
use App\Models\PelatihanModel;
use App\Models\KegiatanSopModel;
use App\Models\JenisPelatihanModel;
use App\Models\ModelPelatihanModel;
use App\Models\BidangPelatihanModel;
use Illuminate\Http\RedirectResponse;

class ManajemenDataController extends Controller
{
    public function sopPelatihan()
    {
        $sopKegiatan = KegiatanSopModel::with('sop')->get()->groupBy('sop');

        // dd($sopKegiatan);
        return view('sop_pelatihan.sopPelatihan',['sopKegiatan' => $sopKegiatan]);
    }
    // public function sopPelatihan_tambah()
    // {
    //     return view('sopPelatihan_tambah');
    // }
    // public function sopPelatihan_insert(Request $request)
    // {
    //     $request->validate([
    //         'id' => 'required',
    //         'sop' => 'required',
    //         'icon' => 'required',
    //     ]);
    //     $sop_insert = SopModel::create($request->all());

    //     $request->validate([
    //         'kegiatan' => 'required',
    //         'deskripsi' => 'required',
    //     ]);
    //     $sop_id = $sop_insert->id;

    //     $lastRecord = KegiatanSopModel::latest('id')->first();
    //     $number = 1;
    //     if ($lastRecord) {
    //         $lastNumber = intval(substr($lastRecord->id, 2));
    //         $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
    //     }
    //     $newId = 'K' . str_pad($number, 3, '0', STR_PAD_LEFT);

    //     $request->merge(['id' => $newId, 'sop' => $sop_id]);
    //     KegiatanSopModel::create($request->all());
    //     return redirect('/sop-pelatihan')->with(['success' => 'Data SOP Pelatihan berhasil ditambahkan', 'popUp_title' => 'Added!']);
    // }
    // public function sopPelatihan_edit($id)
    // {
    //     $sop = SopModel::find($id);
    //     return view('sopPelatihan_edit',['sop' => $sop]);
    // }
    // public function sopPelatihan_update(Request $request, $id)
    // {
    //     $request->validate([
    //         'id' => 'required',
    //         'sop' => 'required',
    //     ]);

    //     $sop = SopModel::find($request->id);
    //     $sop->update($request->all());

    //     return redirect('/sop-pelatihan')->with(['success' => 'Data SOP Pelatihan berhasil diubah', 'popUp_title' => 'Updated!']);

    // }
    // public function sopPelatihan_delete($id)
    // {
    //     KegiatanSopModel::where('sop', $id)->delete();
    //     SopModel::find($id)->delete();

    //     return redirect('/sop-pelatihan')->with(['success' => 'Data SOP Pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    // }

    // public function kegiatanPelatihan_tambah($sop)
    // {
    //     $id_sop = $sop;
    //     $sop = SopModel::all();
    //     return view('kegiatanPelatihan_tambah',['sops' => $sop, 'id_sop' => $id_sop]);
    // }
    // public function kegiatanPelatihan_insert(Request $request)
    // {
    //     $request->validate([
    //         'kegiatan' => 'required',
    //         'deskripsi' => 'required',
    //         'sop' => 'required',
    //     ]);
    //     // Ambil record terakhir dari tabel
    //     $lastRecord = KegiatanSopModel::latest('id')->first();
    //     // Inisialisasi angka awal
    //     $number = 1;
    //     if ($lastRecord) {
    //         $lastNumber = intval(substr($lastRecord->id, 2));
    //         $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
    //     }
    //     // Format ulang ID dengan 'JP' diikuti oleh angka yang telah diincrement
    //     $newId = 'K' . str_pad($number, 3, '0', STR_PAD_LEFT);

    //     // Tambahkan ID yang telah diincrement ke dalam request
    //     $request->merge(['id' => $newId]);
    //     KegiatanSopModel::create($request->all());
    //     // dd($kegiatan);
    //     return redirect('/sop-pelatihan')->with(['success' => 'Data Kegiatan Pelatihan berhasil ditambahkan', 'popUp_title' => 'Added!']);
    // }
    // public function kegiatanPelatihan_edit($id)
    // {
    //     $sop = SopModel::all();
    //     $kegiatan= KegiatanSopModel::find($id);
    //     return view('kegiatanPelatihan_edit',['kegiatan' => $kegiatan, 'sops' => $sop]);
    // }
    // public function kegiatanPelatihan_update(Request $request)
    // {
    //     $request->validate([
    //         'kegiatan' => 'required',
    //         'deskripsi' => 'required',
    //         'sop' => 'required',
    //     ]);

    //     $sop = KegiatanSopModel::find($request->id);
    //     $sop->update($request->all());

    //     return redirect('/sop-pelatihan')->with(['success' => 'Data Kegiatan Pelatihan berhasil diubah', 'popUp_title' => 'Updated!']);
    // }
    // public function kegiatanPelatihan_delete($id)
    // {
    //     KegiatanSopModel::find($id)->delete();

    //     return redirect('/sop-pelatihan')->with(['success' => 'Data Kegiatan Pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    // }

    public function jenisPelatihan()
    {
        $jenis = JenisPelatihanModel::orderBy('id')->get();
        return view('jenis_pelatihan.jenisPelatihan',['jeniss' => $jenis]);
    }
    public function jenisPelatihan_tambah()
    {
        return view('jenis_pelatihan.jenisPelatihan_tambah');
    }
    public function jenisPelatihan_insert(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
        ]);

        // Ambil record terakhir dari tabel
        $lastRecord = JenisPelatihanModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 2));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'JP' diikuti oleh angka yang telah diincrement
        $newId = 'JP' . str_pad($number, 3, '0', STR_PAD_LEFT);

        // Tambahkan ID yang telah diincrement ke dalam request
        $request->merge(['id' => $newId]);

        // Buat record baru menggunakan metode create
        JenisPelatihanModel::create($request->all());

        return redirect('/kelola-jenis-pelatihan')->with(['success' => 'Data Jenis Pelatihan berhasil ditambahkan', 'popUp_title' => 'Added!']);
    }
    public function jenisPelatihan_edit($id)
    {
        $jenis_pelatihan = JenisPelatihanModel::find($id);
        return view('jenis_pelatihan.jenisPelatihan_edit', ['jenis' => $jenis_pelatihan]);
    }
    public function jenisPelatihan_update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $pelatihan = JenisPelatihanModel::find($request->id);
        $pelatihan->update($request->all());

        return redirect('/kelola-jenis-pelatihan')->with(['success' => 'Data Jenis Pelatihan berhasil diubah', 'popUp_title' => 'Updated!']);
    }
    public function jenisPelatihan_delete($id)
    {
        JenisPelatihanModel::find($id)->delete();

        return redirect('/kelola-jenis-pelatihan')->with(['success' => 'Data Jenis Pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    }

    public function bidangPelatihan()
    {
        $bidang = BidangPelatihanModel::orderBy('id')->get();
        return view('bidang_pelatihan.bidangPelatihan',['bidangs' => $bidang]);
    }
    public function bidangPelatihan_tambah()
    {
        return view('bidang_pelatihan.bidangPelatihan_tambah');
    }

    public function bidangPelatihan_insert(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Menyimpan gambar ke dalam path yang ditentukan
        $gambarPath = $request->file('gambar')->store('public/assets/images/bidang_pelatihan');

        // Mendapatkan nama file asli
        $fileName = basename($gambarPath);

        // Ambil record terakhir dari tabel
        $lastRecord = BidangPelatihanModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 2));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'BP' . str_pad($number, 3, '0', STR_PAD_LEFT);

        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = $request->all();
        $requestData['id'] = $newId;
        $requestData['gambar'] = $fileName; // Simpan nama file gambar ke dalam kolom gambar

        // Buat record baru menggunakan metode create
        BidangPelatihanModel::create($requestData);

        return redirect('/kelola-bidang-pelatihan')->with(['success' => 'Data Bidang Pelatihan berhasil ditambahkan', 'popUp_title' => 'Added!']);
    }
    public function bidangPelatihan_edit($id)
    {
        $bidang_pelatihan = BidangPelatihanModel::find($id);
        return view('bidang_pelatihan.bidangPelatihan_edit', ['bidang' => $bidang_pelatihan]);
    }
    public function bidangPelatihan_update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Menyimpan gambar ke dalam path yang ditentukan
        $gambarPath = $request->file('gambar')->store('public/assets/images/bidang_pelatihan');

        // Mendapatkan nama file asli
        $fileName = basename($gambarPath);

        // Ambil record terakhir dari tabel
        $lastRecord = BidangPelatihanModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 2));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'BP' . str_pad($number, 3, '0', STR_PAD_LEFT);

        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = $request->all();
        $requestData['id'] = $newId;
        $requestData['gambar'] = $fileName; // Simpan nama file gambar ke dalam kolom gambar

        // Buat record baru menggunakan metode create
        BidangPelatihanModel::create($requestData);

        $pelatihan = BidangPelatihanModel::find($request->id);
        $pelatihan->update($request->all());

        return redirect('/kelola-bidang-pelatihan')->with(['success' => 'Data Bidang Pelatihan berhasil diubah', 'popUp_title' => 'Updated!']);
    }
    public function bidangPelatihan_delete($id)
    {
        BidangPelatihanModel::find($id)->delete();

        return redirect('/kelola-bidang-pelatihan')->with(['success' => 'Data Bidang Pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    }

    public function modelPelatihan()
    {
        $model = ModelPelatihanModel::orderBy('id')->get();
        return view('model_pelatihan.modelPelatihan',['models' => $model]);
    }
    public function modelPelatihan_tambah()
    {
        return view('model_pelatihan.modelPelatihan_tambah');
    }
    public function modelPelatihan_insert(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
        ]);

        // Ambil record terakhir dari tabel
        $lastRecord = ModelPelatihanModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 2));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'JP' diikuti oleh angka yang telah diincrement
        $newId = 'MP' . str_pad($number, 3, '0', STR_PAD_LEFT);

        // Tambahkan ID yang telah diincrement ke dalam request
        $request->merge(['id' => $newId]);

        // Buat record baru menggunakan metode create
        ModelPelatihanModel::create($request->all());

        return redirect('/kelola-model-pelatihan')->with(['success' => 'Data model Pelatihan berhasil ditambahkan', 'popUp_title' => 'Added!']);
    }
    public function modelPelatihan_edit($id)
    {
        $model_pelatihan = ModelPelatihanModel::find($id);
        return view('model_pelatihan.modelPelatihan_edit', ['model' => $model_pelatihan]);
    }
    public function modelPelatihan_update(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $pelatihan = ModelPelatihanModel::find($request->id);
        $pelatihan->update($request->all());

        return redirect('/kelola-model-pelatihan')->with(['success' => 'Data Model Pelatihan berhasil diubah', 'popUp_title' => 'Updated!']);
    }
    public function modelPelatihan_delete($id)
    {
        ModelPelatihanModel::find($id)->delete();

        return redirect('/kelola-model-pelatihan')->with(['success' => 'Data Model Pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    }
}