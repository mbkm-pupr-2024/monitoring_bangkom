<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;

class SuratController extends Controller
{
    public function index()
    {
        return view('surat.index');
    }

    public function report_progress($id)
    {
        $data = DB::table('status')
        ->select('*')
        ->join('detil_status','status.id','=','detil_status.status')
        ->join('kegiatan','kegiatan.id','=','detil_status.kegiatan')
        ->join('pelatihan','pelatihan.id','=','status.pelatihan')
        ->join('sop','sop.id','=','kegiatan.sop')
        ->where('pelatihan.id','=',$id)
        ->get();

        // dd($data);
        // return view('pelatihan_status', ['sopKegiatan' => $sopKegiatan,'pelatihan' => $pelatihan,'status' => $status, 'detil_status' => $detil_status]);
        return view('surat.report', [
            'data' => $data,
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
