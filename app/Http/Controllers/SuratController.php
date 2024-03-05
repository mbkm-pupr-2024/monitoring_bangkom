<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\KegiatanSopModel;
use App\Models\PelatihanModel;
use App\Models\StatusModel;
use App\Models\DetilStatusModel;


class SuratController extends Controller
{
    public function index()
    {
        $pelatihans = PelatihanModel::with('jenis_pelatihan', 'bidang_pelatihan', 'model_pelatihan')
        ->whereHas('status', function ($query) {
            $query->where('ket_status', 'Sedang berlangsung');
        })
        ->orderBy('created_at', 'desc')
        ->get();

        return view('surat.cetakSurat', ['pelatihans' => $pelatihans]);
    }
    public function cetakSurat_menu($id_pelatihan)
    {
        $pelatihan = PelatihanModel::find($id_pelatihan);

        return view('surat.cetakSurat_menu', ['pelatihan' => $pelatihan]);
    }

    public function progress_pelatihan($id)
    {
        // $data = DB::table('status')
        // ->select('sop.id', 'sop.icon as icon', 'kegiatan_sop.nama as sop', 'judul')
        // ->join('detil_status','status.id','=','detil_status.id_status')
        // ->join('kegiatan_sop','kegiatan_sop.id','=','detil_status.id_kegiatan_sop')
        // ->join('pelatihan','pelatihan.id','=','status.id_pelatihan')
        // ->join('sop','sop.id','=','kegiatan_sop.id_sop')
        // ->where('pelatihan.id','=',$id)
        // // ->groupBy('sop.id')
        // ->get();

        $status = StatusModel::where('id_pelatihan', $id)->first();
        $detil_status = DetilStatusModel::where('id_status', $status->id)->get();
        $sopKegiatan = KegiatanSopModel::with('sop')->get()->groupBy('id_sop');
        $pelatihan = PelatihanModel::find($id);
        // dd($detil_status);

        // dd($detil_status);
        // return view('pelatihan_status', ['sopKegiatan' => $sopKegiatan,'pelatihan' => $pelatihan,'status' => $status, 'detil_status' => $detil_status]);
        return view('surat.progres_pelatihan', [
            'sop_kegiatans' => $sopKegiatan,
            'detil_status' => $detil_status,
        ]);
    }

    public function pemanggilan_peserta($id_pelatihan)
    {
        $pelatihan = PelatihanModel::find($id_pelatihan);

        return view('surat.pemanggilan_peserta', [
            'pelatihan' => $pelatihan,
        ]);
    }

    public function pengembalian_peserta($id_pelatihan)
    {
        $pelatihan = PelatihanModel::find($id_pelatihan);

        return view('surat.pengembalian_peserta', [
            'pelatihan' => $pelatihan,
        ]);
    }

    public function keputusan_pelatihan($id_pelatihan)
    {
        $pelatihan = PelatihanModel::find($id_pelatihan);

        return view('surat.keputusan_pelatihan', [
            'pelatihan' => $pelatihan,
        ]);
    }

    public function kehadiran_pembukaan($id_pelatihan)
    {
        $pelatihan = PelatihanModel::find($id_pelatihan);

        return view('surat.kehadiran_pembukaan', [
            'pelatihan' => $pelatihan,
        ]);
    }

    public function kehadiran_penutupan($id_pelatihan)
    {
        $pelatihan = PelatihanModel::find($id_pelatihan);

        return view('surat.kehadiran_penutupan', [
            'pelatihan' => $pelatihan,
        ]);
    }

    public function sambutan_pembukaan($id_pelatihan)
    {
        $pelatihan = PelatihanModel::find($id_pelatihan);

        return view('surat.sambutan_pembukaan', [
            'pelatihan' => $pelatihan,
        ]);
    }

    public function sambutan_penutupan($id_pelatihan)
    {
        $pelatihan = PelatihanModel::find($id_pelatihan);

        return view('surat.sambutan_penutupan', [
            'pelatihan' => $pelatihan,
        ]);
    }


    public function excel() {
        // Excel::import(new UserImport, public_path('\assets\excel\book1.xlsx'));
        // dd(public_path('\assets'));
        return view('surat.formPemanggilan');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');

        // get collection from each row
        $data = Excel::toCollection(new UserImport, $file);
        $data = $data[0]->map(function($row) {
            return [
                'no' => $row[0],
                'nama' => $row[1],
                'nip' => $row[2],
                'jabatan' => $row[3],
                'unit_kerja' => $row[4],
                'keterangan' => $row[5],
            ];
        });
        dd($data);

        // $import = new UserImport; // Sesuaikan dengan nama class impor Anda
        // Excel::import($import, $file);

        // // $data = $import->getData();
        // // $data = $import->collection($file);
        // dd();

        // Lakukan sesuatu dengan data (misalnya, tampilkan di view)
        return view('surat.formCetak', compact('data'));
    }
}
