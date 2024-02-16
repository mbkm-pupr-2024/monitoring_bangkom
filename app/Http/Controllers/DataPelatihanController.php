<?php

namespace App\Http\Controllers;

use App\Models\SopModel;
use Illuminate\Http\Request;
use App\Models\KegiatanModel;
use App\Models\BidangPelatihanModel;
use Illuminate\Http\RedirectResponse;

class DataPelatihanController extends Controller
{
    public function sopPelatihan()
    {
        $sopKegiatan = KegiatanModel::with('sop_pelatihan')->get()->groupBy('sop');

        // dd($sopKegiatan);
        return view('sopPelatihan',['sopKegiatan' => $sopKegiatan]);
    }
    public function sopPelatihan_tambah()
    {
        return view('sopPelatihan_tambah');
    }
    public function sopPelatihan_insert(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'sop' => 'required',
            'icon' => 'required',
        ]);
        $sop_insert = SopModel::create($request->all());

        $request->validate([
            'kegiatan' => 'required',
            'deskripsi' => 'required',
        ]);
        $sop_id = $sop_insert->id;

        $lastRecord = KegiatanModel::latest('id')->first();
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 2));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        $newId = 'K' . str_pad($number, 3, '0', STR_PAD_LEFT);

        $request->merge(['id' => $newId, 'sop' => $sop_id]);
        KegiatanModel::create($request->all());
        return redirect('/sop-pelatihan')->with(['success' => 'Data SOP Pelatihan berhasil ditambahkan', 'popUp_title' => 'Added!']);
    }
    public function sopPelatihan_edit($id)
    {
        $sop = SopModel::find($id);
        return view('sopPelatihan_edit',['sop' => $sop]);
    }
    public function sopPelatihan_update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required',
            'sop' => 'required',
        ]);

        $sop = SopModel::find($request->id);
        $sop->update($request->all());

        return redirect('/sop-pelatihan')->with(['success' => 'Data SOP Pelatihan berhasil diubah', 'popUp_title' => 'Updated!']);

    }
    public function sopPelatihan_delete($id)
    {
        KegiatanModel::where('sop', $id)->delete();
        SopModel::find($id)->delete();

        return redirect('/sop-pelatihan')->with(['success' => 'Data SOP Pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    }

    public function kegiatanPelatihan_tambah($sop)
    {
        $id_sop = $sop;
        $sop = SopModel::all();
        return view('kegiatanPelatihan_tambah',['sops' => $sop, 'id_sop' => $id_sop]);
    }
    public function kegiatanPelatihan_insert(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'sop' => 'required',
        ]);
        // Ambil record terakhir dari tabel
        $lastRecord = KegiatanModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 2));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'JP' diikuti oleh angka yang telah diincrement
        $newId = 'K' . str_pad($number, 3, '0', STR_PAD_LEFT);

        // Tambahkan ID yang telah diincrement ke dalam request
        $request->merge(['id' => $newId]);
        KegiatanModel::create($request->all());
        // dd($kegiatan);
        return redirect('/sop-pelatihan')->with(['success' => 'Data Kegiatan Pelatihan berhasil ditambahkan', 'popUp_title' => 'Added!']);
    }
    public function kegiatanPelatihan_edit($id)
    {
        $sop = SopModel::all();
        $kegiatan= KegiatanModel::find($id);
        return view('kegiatanPelatihan_edit',['kegiatan' => $kegiatan, 'sops' => $sop]);
    }
    public function kegiatanPelatihan_update(Request $request)
    {
        $request->validate([
            'kegiatan' => 'required',
            'deskripsi' => 'required',
            'sop' => 'required',
        ]);

        $sop = KegiatanModel::find($request->id);
        $sop->update($request->all());

        return redirect('/sop-pelatihan')->with(['success' => 'Data Kegiatan Pelatihan berhasil diubah', 'popUp_title' => 'Updated!']);
    }
    public function kegiatanPelatihan_delete($id)
    {
        KegiatanModel::find($id)->delete();

        return redirect('/sop-pelatihan')->with(['success' => 'Data Kegiatan Pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    }

    public function bidangPelatihan()
    {
        $bidang = BidangPelatihanModel::orderBy('id')->get();
        return view('bidangPelatihan',['bidangs' => $bidang]);
    }
    public function bidangPelatihan_tambah()
    {
        return view('bidangPelatihan_tambah');
    }
    public function bidangPelatihan_insert(Request $request): RedirectResponse
    {
        $request->validate([
            'bidang_pelatihan' => 'required',
            'gambar' => 'required',
        ]);

        // Ambil record terakhir dari tabel
        $lastRecord = BidangPelatihanModel::latest('id')->first();
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
        BidangPelatihanModel::create($request->all());

        return redirect('/bidang-pelatihan')->with(['success' => 'Data Bidang Pelatihan berhasil ditambahkan', 'popUp_title' => 'Added!']);
    }
    public function bidangPelatihan_edit($id)
    {
        $bidang_pelatihan = BidangPelatihanModel::find($id);
        return view('bidangPelatihan_edit', ['bidang' => $bidang_pelatihan]);
    }
    public function bidangPelatihan_update(Request $request)
    {
        $request->validate([
            'bidang_pelatihan' => 'required',
        ]);

        $pelatihan = BidangPelatihanModel::find($request->id);
        $pelatihan->update($request->all());

        return redirect('/bidang-pelatihan')->with(['success' => 'Data Bidang Pelatihan berhasil diubah', 'popUp_title' => 'Updated!']);
    }
    public function bidangPelatihan_delete($id)
    {
        BidangPelatihanModel::find($id)->delete();

        return redirect('/bidang-pelatihan')->with(['success' => 'Data Bidang Pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    }

}