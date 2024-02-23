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
        return view('surat.index');
    }

    public function report_progress($id)
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
        return view('surat.report', [
            'sop_kegiatans' => $sopKegiatan,
            'detil_status' => $detil_status,
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
                'nama' => $row[0],
                'sekolah' => $row[1],
                'tanun' => $row[2],
            ];
        });
        // dd($data);

        // $import = new UserImport; // Sesuaikan dengan nama class impor Anda
        // Excel::import($import, $file);

        // // $data = $import->getData();
        // // $data = $import->collection($file);
        // dd();

        // Lakukan sesuatu dengan data (misalnya, tampilkan di view)
        return view('surat.formCetak', compact('data'));
    }
}
