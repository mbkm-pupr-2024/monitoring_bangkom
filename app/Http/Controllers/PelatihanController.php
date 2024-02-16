<?php

namespace App\Http\Controllers;

use App\Models\StatusModel;
use Illuminate\Http\Request;
use App\Models\KegiatanModel;
use App\Models\PelatihanModel;
use App\Models\DetilStatusModel;
use App\Models\BidangPelatihanModel;
use Illuminate\Http\RedirectResponse;

class PelatihanController extends Controller
{
    public function pelatihan_tambah()
    {
        $bidang_pelatihan = BidangPelatihanModel::all();
        return view('pelatihan_tambah',['bidangPelatihan' => $bidang_pelatihan]);
    }
    public function pelatihan_insert(Request $request): RedirectResponse
    {
        $request->validate([
            'pelatihan' => 'required',
            'bidang_pelatihan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $lastRecordPelatihan = PelatihanModel::latest('id')->first();
        $numberPelatihan = 1;
        if ($lastRecordPelatihan) {
            $lastNumber = intval(substr($lastRecordPelatihan->id, 1));
            $numberPelatihan = ($lastNumber < 99999) ? $lastNumber + 1 : 1;
        }
        $newIdPelatihan = 'P' . str_pad($numberPelatihan, 5, '0', STR_PAD_LEFT);

        $request->merge(['id' => $newIdPelatihan]);

        PelatihanModel::create($request->all());

        $lastRecordStatus = StatusModel::latest('id')->first();
        $numberStatus = 1;
        if ($lastRecordStatus) {
            $lastNumber = intval(substr($lastRecordStatus->id, 1));
            $numberStatus = ($lastNumber < 99999) ? $lastNumber + 1 : 1;
        }
        $newIdStatus = 'S' . str_pad($numberStatus, 5, '0', STR_PAD_LEFT);

        StatusModel::create([
            'id' => $newIdStatus,
            'pelatihan' => $newIdPelatihan,
            'status' => 'Sedang berlangsung',
        ]);

        return redirect('/pelatihan-berlangsung')->with(['success' => 'Data Pelatihan berhasil ditambahkan', 'popUp_title' => 'Added!']);
    }
    public function pelatihan_edit($id){
        $bidang_pelatihan = BidangPelatihanModel::all();
        $pelatihan = PelatihanModel::find($id);

        return view('pelatihan_edit', ['bidangPelatihan' =>$bidang_pelatihan,'pelatihan' => $pelatihan]);
    }
    public function pelatihan_update(Request $request){
        $request->validate([
            'pelatihan' => 'required',
            'bidang_pelatihan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
        ]);

        $pelatihan = PelatihanModel::find($request->id);
        $pelatihan->update($request->all());

        return redirect('/pelatihan-berlangsung')->with('success', 'Data Pelatihan berhasil diubah')->with('popUp_title','Updated!');
    }
    public function pelatihan_delete($id){
        StatusModel::where('pelatihan', $id)->delete();
        DetilStatusModel::where('status', $id)->delete();
        PelatihanModel::find($id)->delete();

        return redirect('/pelatihan-berlangsung')->with(['success' => 'Data Pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    }

    public function pelatihan_berlangsung()
    {
        $pelatihan = PelatihanModel::with('bidangPelatihan')
        ->whereHas('status', function ($query) {
            $query->where('status', 'Sedang berlangsung');
        })->orderBy('created_at', 'desc')->get();

        return view('pelatihanBerlangsung', ['pelatihans' => $pelatihan]);
    }
    public function pelatihan_status($id)
    {
        $status = StatusModel::where('pelatihan', $id)->first();
        $detil_status = DetilStatusModel::where('status', $status->id)->get();
        $sopKegiatan = KegiatanModel::with('sop_pelatihan')->get()->groupBy('sop');
        $pelatihan = PelatihanModel::find($id);
        return view('pelatihan_status', ['sopKegiatan' => $sopKegiatan,'pelatihan' => $pelatihan,'status' => $status, 'detil_status' => $detil_status]);
    }
    public function pelatihan_ceklisStatus($id_pl, $id_kg)
    {
        $status = StatusModel::where('pelatihan', $id_pl)->first();
        $detil_status = DetilStatusModel::where('status', $status->id)->where('kegiatan', $id_kg)->first();
        if ($detil_status) {
            $detil_status->delete();
        } else {
            $lastRecord = DetilStatusModel::latest('id')->first();
            $number = 1;
            if ($lastRecord) {
                $lastNumber = intval(substr($lastRecord->id, 2));
                $number = ($lastNumber < 99999) ? $lastNumber + 1 : 1;
            }
            $newId = 'DS' . str_pad($number, 5, '0', STR_PAD_LEFT);

            DetilStatusModel::create([
                'id' => $newId,
                'status' => $status->id,
                'kegiatan' => $id_kg,
            ]);
        }

        //*Cek apakah per sop sudah selesai atau belum????
        // if (DetilStatusModel::where('status', $status->id)->count() == KegiatanModel::where('sop', KegiatanModel::find($id_kg)->sop)->count()) {
        //     $status->update(['status' => 'Selesai']);
        // } else {
        //     $status->update(['status' => 'Sedang berlangsung']);
        // }

        //Update Status Pelatihan Telah Selesai
        if (DetilStatusModel::where('status', $status->id)->count() == KegiatanModel::all()->count()) {
            StatusModel::find($status->id)->update(['status' => 'Selesai']);
        }

        return redirect()->back()->with('success', 'Data Pelatihan berhasil diubah')->with('popUp_title','Updated!');
    }
    public function pelatihan_selesai()
    {
        $pelatihan = PelatihanModel::with('bidangPelatihan')
        ->whereHas('status', function ($query) {
            $query->where('status', 'Selesai');
        })->get();

        return view('pelatihanSelesai', ['pelatihans' => $pelatihan]);
    }

}