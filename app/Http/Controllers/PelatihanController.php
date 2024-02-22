<?php

namespace App\Http\Controllers;

use App\Models\StatusModel;
use Illuminate\Http\Request;
use App\Models\PelatihanModel;
use App\Models\DetilStatusModel;
use App\Models\KegiatanSopModel;
use Illuminate\Support\Facades\DB;
use App\Models\JenisPelatihanModel;
use App\Models\ModelPelatihanModel;
use App\Models\BidangPelatihanModel;
use Illuminate\Http\RedirectResponse;

class PelatihanController extends Controller
{
    public function jadwalPelatihan()
    {
        $jadwal_pelatihan = PelatihanModel::with('jenis_pelatihan','bidang_pelatihan','model_pelatihan','status')->whereHas('status', function ($query) {
            $query->where('ket_status', '=', 'Terjadwal'); })->get();
        return view('jadwal_pelatihan.jadwalPelatihan',['jadwals' => $jadwal_pelatihan]);
    }
    public function jadwalPelatihan_tambah()
    {
        $jenis_pelatihan = JenisPelatihanModel::all();
        $bidang_pelatihan = BidangPelatihanModel::all();
        $model_pelatihan = ModelPelatihanModel::all();
        return view('jadwal_pelatihan.jadwalPelatihan_tambah',['jeniss' => $jenis_pelatihan,'bidangs' => $bidang_pelatihan, 'models' => $model_pelatihan]);
    }
    public function jadwalPelatihan_insert(Request $request): RedirectResponse
    {
        $request->validate([
            'nama' => 'required',
            'id_jenis' => 'required',
            'id_bidang' => 'required',
            'id_model' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'tahun_periode' => 'required',
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
            'id_pelatihan' => $newIdPelatihan,
            'ket_status' => 'Terjadwal',
        ]);

        return redirect('/jadwal-pelatihan')->with(['success' => 'Jadwal pelatihan berhasil ditambahkan', 'popUp_title' => 'Added!']);
    }
    public function jadwalPelatihan_start($id){
        StatusModel::where('id_pelatihan', $id)->update(['ket_status' => 'Sedang berlangsung']);

        return redirect('/pelatihan-berlangsung')->with(['success' => 'Pelatihan telah dimulai', 'popUp_title' => 'Started!']);
    }
    public function jadwalPelatihan_edit($id){
        $jenis_pelatihan = JenisPelatihanModel::all();
        $bidang_pelatihan = BidangPelatihanModel::all();
        $model_pelatihan = ModelPelatihanModel::all();
        $pelatihan = PelatihanModel::find($id);

        return view('jadwal_pelatihan.jadwalPelatihan_edit', ['jeniss' => $jenis_pelatihan ,'bidangs' =>$bidang_pelatihan, 'models' => $model_pelatihan,'pelatihan' => $pelatihan]);
    }
    public function jadwalPelatihan_update(Request $request){
        $request->validate([
            'nama' => 'required',
            'id_jenis' => 'required',
            'id_bidang' => 'required',
            'id_model' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'tahun_periode' => 'required',
        ]);

        $pelatihan = PelatihanModel::find($request->id);
        $pelatihan->update($request->all());

        return redirect('/jadwal-pelatihan')->with('success', 'Jadwal pelatihan berhasil diubah')->with('popUp_title','Updated!');
    }
    public function jadwalPelatihan_delete($id){
        StatusModel::where('id_pelatihan', $id)->delete();
        PelatihanModel::find($id)->delete();

        return redirect('/jadwal-pelatihan')->with(['success' => 'Jadwal pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    }

    
    public function pelatihan_berlangsung()
    {
        $pelatihans = PelatihanModel::with('jenis_pelatihan', 'bidang_pelatihan', 'model_pelatihan')
        ->whereHas('status', function ($query) {
            $query->where('ket_status', 'Sedang berlangsung');
        })
        ->orderBy('created_at', 'desc')
        ->get();

        $status_terakhir = DetilStatusModel::whereIn('id_status', function ($query) {
            $query->select(DB::raw('MAX(id_status)'))
                ->from('detil_status')
                ->groupBy('id_status');
        })
        ->leftJoin('status', 'detil_status.id_status', '=', 'status.id')
        ->leftJoin('kegiatan_sop', 'detil_status.id_kegiatan_sop', '=', 'kegiatan_sop.id')
        ->whereIn('status.id_pelatihan', $pelatihans->pluck('id'))
        ->select('detil_status.id_kegiatan_sop', 'status.id_pelatihan', 'kegiatan_sop.nama') 
        ->get()
        ->keyBy('id_pelatihan')
        ->map(function ($item) {
            return $item->nama;
        });
    
        // dd($status_terakhir);

        return view('pelatihan.pelatihanBerlangsung', ['pelatihans' => $pelatihans, 'status_terakhir' => $status_terakhir]);
    }
    public function pelatihan_delete($id){
        StatusModel::where('id_pelatihan', $id)->delete();
        DetilStatusModel::where('id_status', $id)->delete();
        PelatihanModel::find($id)->delete();

        return redirect('/pelatihan-berlangsung')->with(['success' => 'Jadwal pelatihan berhasil dihapus', 'popUp_title' => 'Deleted!']);
    }

    public function pelatihan_status($id)
    {
        $status = StatusModel::where('id_pelatihan', $id)->first();
        $detil_status = DetilStatusModel::where('id_status', $status->id)->get();
        $sopKegiatan = KegiatanSopModel::with('sop')->get()->groupBy('id_sop');
        $pelatihan = PelatihanModel::find($id);
        // dd($detil_status);
        return view('pelatihan.pelatihan_status', ['sopKegiatan' => $sopKegiatan,'pelatihan' => $pelatihan,'status' => $status, 'detil_status' => $detil_status]);
    }
    public function pelatihan_ceklisStatus($id_pl, $id_kg)
    {
        $status = StatusModel::where('id_pelatihan', $id_pl)->first();
        $detil_status = DetilStatusModel::where('id_status', $status->id)->where('id_kegiatan_sop', $id_kg)->first();
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
                'id_status' => $status->id,
                'id_kegiatan_sop' => $id_kg,
            ]);
        }

        //*Cek apakah per sop sudah selesai atau belum????
        // if (DetilStatusModel::where('status', $status->id)->count() == KegiatanModel::where('sop', KegiatanModel::find($id_kg)->sop)->count()) {
        //     $status->update(['status' => 'Selesai']);
        // } else {
        //     $status->update(['status' => 'Sedang berlangsung']);
        // }

        //Update Status Pelatihan Telah Selesai
        if (DetilStatusModel::where('id_status', $status->id)->count() == KegiatanSopModel::all()->count()) {
            StatusModel::find($status->id)->update(['ket_status' => 'Selesai']);
        }

        return redirect()->back()->with('success', 'Status Pelatihan berhasil diperbarui')->with('popUp_title','Updated!');
    }
    public function arsip_pelatihan()
    {
        $pelatihan = PelatihanModel::with('jenis_pelatihan','bidang_pelatihan', 'model_pelatihan','status')
        ->whereHas('status', function ($query) {
            $query->where('ket_status', 'Selesai');
        })->get();

        return view('pelatihan.arsipPelatihan', ['pelatihans' => $pelatihan]);
    }
    public function cetak_surat()
    {
        return view('cetakSurat');
    }

}