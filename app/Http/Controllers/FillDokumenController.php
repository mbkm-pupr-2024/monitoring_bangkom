<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use App\Imports\UserImport;
use App\Models\StatusModel;
use Illuminate\Http\Request;
use App\Models\PelatihanModel;
use App\Models\DetilStatusModel;
use App\Models\KegiatantahapanModel;
use Maatwebsite\Excel\Facades\Excel;

class FillDokumenController extends Controller
{
    public function form_dokumen_pelatihan($id_pl,$id_kthp)
    {
        $pelatihan = PelatihanModel::find($id_pl);
        
        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_kegiatan_break = str_replace([' ', ','], '', $nama_kegiatan);
        // dd($nama_kegiatan_break);
        return view('dokumen.form.'. $nama_kegiatan_break ,[
            'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan,
            'nama_fungsi' => $nama_kegiatan_break
       ]);
    }
    ////////////////////////////// FORM THE DOCUMENT////////////////////////////////////


    public function fill_SuratUndanganRapatPersiapan($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required', 
            'zoom_id' => 'required',
            'passcode' => 'required',
            'req_udRapat' => 'required|mimes:xls,xlsx',
            ]);

        // dd($request->file('file'));

        $file = $request->file('req_udRapat');

        // get collection from each row
        $req = Excel::toCollection(new UserImport, $file);
        $req = $req[0]->map(function($row) {
            return [
                'tim_pusbangkom' => $row[0],
                'tim_bapekom' => $row[2],
                'tembusan' => $row[4],
            ];
        });

        $req = $req->toArray();

        $pelatihan = PelatihanModel::find($id_pl);
        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);

        $path = public_path().'/assets/images/pupr.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/'. $type . ';base64,'. base64_encode($data);

        // Kirim objek $request bersama dengan data lainnya ke tampilan HTML
        $data = [
            'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan,
            'request' => $request,
            'logo' => $logo,
            'data' => $req,
        ];

        // Tampilkan view HTML dengan nilai-nilai dari objek $request
        $html_content = view('dokumen.cetak.' . $nama_fungsi, $data)->render();

        $pdf = new Dompdf();
        $pdf->loadHtml($html_content);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdf_content = $pdf->output();
        return view('dokumen.previewDokumenCetak', ['pdf_content' => $pdf_content,'pelatihan' => $pelatihan,
        'kegiatan' => $kegiatanTahapan, 'nama_fungsi' => $nama_fungsi, 'kegiatan' => $kegiatanTahapan]);

    }
    public function fill_NotulenRapatPersiapan($id_pl, $id_kthp, Request $request)
    {
        

    }
    public function fill_PedomanPelatihan($id_pl, $id_kthp, Request $request)
    {
        

    }
    public function fill_SuratPenetapanPengajar($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'suratPenetapanPengajar' => 'required|mimes:docx,pdf',
        ]);

        $extension = $request->file('suratPpenetapanPengajar')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('suratPenetapanPengajar')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);
    }
    public function fill_SuratPenetapanPeserta($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'suratPenetapanPeserta' => 'required|mimes:docx,pdf',
        ]);

        $extension = $request->file('suratPenetapanPeserta')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('suratPenetapanPeserta')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);

    }
    public function fill_SuratPemanggilanPeserta($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'kata_ganti' => 'required',
            'nama_yth' => 'required',
            'lokasi' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required', 
            'zoom_id' => 'required',
            'passcode' => 'required',
        ]);
    
        $pelatihan = PelatihanModel::find($id_pl);
        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
    
        $path = public_path().'/assets/images/pupr.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/'. $type . ';base64,'. base64_encode($data);
    
        // Kirim objek $request bersama dengan data lainnya ke tampilan HTML
        $data = [
            'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan,
            'request' => $request,
            'logo' => $logo,
        ];
    
        // Tampilkan view HTML dengan nilai-nilai dari objek $request
        $html_content = view('dokumen.cetak.' . $nama_fungsi, $data)->render();
    
    
        $pdf = new Dompdf();
        $pdf->loadHtml($html_content);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        $pdf_content = $pdf->output();
        return view('dokumen.preview.' . $nama_fungsi, ['pdf_content' => $pdf_content,'pelatihan' => $pelatihan,
        'kegiatan' => $kegiatanTahapan, 'nama_fungsi' => $nama_fungsi]);
    
        
        
        // Tampilkan PDF atau simpan PDF ke dalam file
        return $pdf->stream(); // Tampilkan PDF di browser
        // atau
        // return $pdf->save('lokasi_direktori/file.pdf'); // Simpan PDF ke dalam file
        ///////////////////////////////////////////
        $request->validate([
            'daftar_calon_peserta' => 'required|mimes:xls,xlsx',
        ]);

        // dd($request->file('file'));

        $file = $request->file('daftar_calon_peserta');

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

        $pelatihan = PelatihanModel::find($id_pl);

        return view('dokumen.cetak.SuratPemanggilanPeserta', compact('data'), [
            'pelatihan' => $pelatihan, 'id_pelatihan' => $id_pl, 'request' => $request,
        ]);
    }
    public function fill_FormBiodataTF4($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'formBiodata' => 'required|mimes:xls,xlsx',
        ]);

        $extension = $request->file('formBiodata')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('formBiodata')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);
    }
    public function fill_SKPelatihan($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'kata_ganti' => 'required',
            'nama_yth' => 'required',
            'lokasi' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required', 
            'zoom_id' => 'required',
            'passcode' => 'required',
        ]);

        $pelatihan = PelatihanModel::find($id_pl);

        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
        return view('dokumen.cetak.' . $nama_fungsi, [
            'pelatihan' => $pelatihan,'kegiatan' => $kegiatanTahapan,'request' => $request,
        ]);


    }
    public function fill_SuratPermohonanMembukadanMenghadiri($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kata_ganti' => 'required',
            'nama_yth' => 'required',
            'lokasi' => 'required',
            'nomor_surat_terkait' => 'required',
            'tanggal_surat_terkait' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required', 
            'zoom_id' => 'required',
            'passcode' => 'required',
            'req_suratPermohonanMembuka' => 'required|mimes:xls,xlsx',
            ]);
    
            $file = $request->file('req_suratPermohonanMembuka');
    
            // get collection from each row
            $req = Excel::toCollection(new UserImport, $file);
            $req = $req[0]->map(function($row) {
                return [
                    'tembusan' => $row[0],
                ];
            });
    
            $req = $req->forget(0);
    
            $pelatihan = PelatihanModel::with('model_pelatihan')->find($id_pl);
            $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
            $nama_kegiatan = $kegiatanTahapan->dokumen;
            $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
    
            $path = public_path().'/assets/images/pupr.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $logo = 'data:image/'. $type . ';base64,'. base64_encode($data);
    
            // Kirim objek $request bersama dengan data lainnya ke tampilan HTML
            $data = [
                'pelatihan' => $pelatihan,
                'kegiatan' => $kegiatanTahapan,
                'request' => $request,
                'logo' => $logo,
                'data' => $req,
            ];
    
            // Tampilkan view HTML dengan nilai-nilai dari objek $request
            $html_content = view('dokumen.cetak.' . $nama_fungsi, $data)->render();
    
            $pdf = new Dompdf();
            $pdf->loadHtml($html_content);
            $pdf->setPaper('A4', 'portrait');
            $pdf->render();
    
            $pdf_content = $pdf->output();
            return view('dokumen.previewDokumenCetak', ['pdf_content' => $pdf_content,'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan, 'nama_fungsi' => $nama_fungsi, 'kegiatan' => $kegiatanTahapan]);
    }
    public function fill_SuratUndanganMenghadiriPembukaan($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kata_ganti' => 'required',
            'nama_yth' => 'required',
            'lokasi' => 'required',
            'waktu_mulai' => 'required',
            'zoom_id' => 'required',
            'passcode' => 'required',
            'req_suratUndanganMenghadiriPembukaan' => 'required|mimes:xls,xlsx',
            ]);
    
            $file = $request->file('req_suratUndanganMenghadiriPembukaan');
    
            // get collection from each row
            $req = Excel::toCollection(new UserImport, $file);
            $req = $req[0]->map(function($row) {
                return [
                    'tembusan' => $row[0],
                ];
            });
    
            $req = $req->forget(0);
    
            $pelatihan = PelatihanModel::with('model_pelatihan')->find($id_pl);
            $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
            $nama_kegiatan = $kegiatanTahapan->dokumen;
            $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
    
            $path = public_path().'/assets/images/pupr.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $logo = 'data:image/'. $type . ';base64,'. base64_encode($data);
    
            // Kirim objek $request bersama dengan data lainnya ke tampilan HTML
            $data = [
                'pelatihan' => $pelatihan,
                'kegiatan' => $kegiatanTahapan,
                'request' => $request,
                'logo' => $logo,
                'data' => $req,
            ];
    
            // Tampilkan view HTML dengan nilai-nilai dari objek $request
            $html_content = view('dokumen.cetak.' . $nama_fungsi, $data)->render();
    
            $pdf = new Dompdf();
            $pdf->loadHtml($html_content);
            $pdf->setPaper('A4', 'portrait');
            $pdf->render();
    
            $pdf_content = $pdf->output();
            return view('dokumen.previewDokumenCetak', ['pdf_content' => $pdf_content,'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan, 'nama_fungsi' => $nama_fungsi, 'kegiatan' => $kegiatanTahapan]);

    }
    public function fill_SambutanPembukaanKepalaPusat($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'sambutanPembukaanKapus' => 'required|mimes:docx,pdf',
        ]);

        $extension = $request->file('sambutanPembukaanKapus')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('sambutanPembukaanKapus')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);
    }
    public function fill_LaporanPembukaan($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'req_laporanPembukaan' => 'required|mimes:xls,xlsx',
            ]);

        // dd($request->file('file'));

        $file = $request->file('req_laporanPembukaan');

        // get collection from each row
        $req = Excel::toCollection(new UserImport, $file);
        $req = $req[0]->map(function($row) {
            return [
                'kepala_bpsdm' => $row[0],
                'kepada_yth' => $row[1],
                'nama_yth' => $row[2],
                'yg_dihormati' => $row[3],
                'dasar_pelaksanaan' => $row[4],
                'tujuan' => $row[5],
                'no_peserta' => $row[6],
                'unit_kerja_peserta' => $row[7],
                'jumlah_peserta' => $row[8],
                'no_kurikulum' => $row[9],
                'mapel_kurikulum' => $row[10],
                'jp_kurikulum' => $row[11],
                'evaluasi' => $row[12],
                'pantun' => $row[13],
            ];
        });

        $req = $req->forget(0);

        $data_req = [];
        $data_req['kepala_bpsdm'] = [];
        $data_req['kepada_yth'] = [];
        $data_req['nama_yth'] = [];
        $data_req['yg_dihormati'] = [];
        $data_req['dasar_pelaksanaan'] = [];
        $data_req['tujuan'] = [];
        $data_req['no_peserta'] = [];
        $data_req['unit_kerja_peserta'] = [];
        $data_req['jumlah_peserta'] = [];
        $data_req['no_kurikulum'] = [];
        $data_req['mapel_kurikulum'] = [];
        $data_req['jp_kurikulum'] = [];
        $data_req['evaluasi'] = [];
        $data_req['pantun'] = [];

        foreach($req as $item){
            if($item['kepala_bpsdm'] != null){
                array_push($data_req['kepala_bpsdm'], $item['kepala_bpsdm']);
            }
            if($item['kepada_yth'] != null){
                array_push($data_req['kepada_yth'], $item['kepada_yth']);
            }
            if($item['nama_yth'] != null){
                array_push($data_req['nama_yth'], $item['nama_yth']);
            }
            if($item['yg_dihormati'] != null){
                array_push($data_req['yg_dihormati'], $item['yg_dihormati']);
            }
            if($item['dasar_pelaksanaan'] != null){
                array_push($data_req['dasar_pelaksanaan'], $item['dasar_pelaksanaan']);
            }
            if($item['tujuan'] != null){
                array_push($data_req['tujuan'], $item['tujuan']);
            }
            if($item['no_peserta'] != null){
                array_push($data_req['no_peserta'], $item['no_peserta']);
            }
            if($item['unit_kerja_peserta'] != null){
                array_push($data_req['unit_kerja_peserta'], $item['unit_kerja_peserta']);
            }
            if($item['jumlah_peserta'] != null){
                array_push($data_req['jumlah_peserta'], $item['jumlah_peserta']);
            }
            if($item['no_kurikulum'] != null){
                array_push($data_req['no_kurikulum'], $item['no_kurikulum']);
            }
            if($item['mapel_kurikulum'] != null){
                array_push($data_req['mapel_kurikulum'], $item['mapel_kurikulum']);
            }
            if($item['jp_kurikulum'] != null){
                array_push($data_req['jp_kurikulum'], $item['jp_kurikulum']);
            }
            if($item['evaluasi'] != null){
                array_push($data_req['evaluasi'], $item['evaluasi']);
            }
            if($item['pantun'] != null){
                array_push($data_req['pantun'], $item['pantun']);
            }
        }
        // dd($data_req['kepala_bpsdm']);

        array_shift($data_req['no_peserta']);
        array_shift($data_req['unit_kerja_peserta']);
        array_shift($data_req['jumlah_peserta']);

        array_shift($data_req['no_kurikulum']);
        array_shift($data_req['mapel_kurikulum']);
        array_shift($data_req['jp_kurikulum']);
         

        $pelatihan = PelatihanModel::with('model_pelatihan')->find($id_pl);
        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);

        $path = public_path().'/assets/images/pupr.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/'. $type . ';base64,'. base64_encode($data);

        // Kirim objek $request bersama dengan data lainnya ke tampilan HTML
        $data = [
            'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan,
            'request' => $request,
            'logo' => $logo,
            'data' => $data_req,
            // 'total_jp' => $total_jp,
        ];

        // Tampilkan view HTML dengan nilai-nilai dari objek $request
        $html_content = view('dokumen.cetak.' . $nama_fungsi, $data)->render();

        $pdf = new Dompdf();
        $pdf->loadHtml($html_content);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdf_content = $pdf->output();
        return view('dokumen.previewDokumenCetak', ['pdf_content' => $pdf_content,'pelatihan' => $pelatihan,
        'kegiatan' => $kegiatanTahapan, 'nama_fungsi' => $nama_fungsi, 'kegiatan' => $kegiatanTahapan]);

    }
    public function fill_VirtualBackgroundSpandukBackdrop($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'virtualBg' => 'required|mimes:jpg, jpeg, zip, rar',
        ]);

        $extension = $request->file('virtualBg')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('virtualBg')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);
       
    }
    public function fill_DokumentasiCeremonyPembukaan($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'dokumentasiCeremony' => 'required|mimes:jpg,jpeg,zip,rar',
        ]);

        $extension = $request->file('dokumentasiCeremony')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('dokumentasiCeremony')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);


    }
    public function fill_BahanTayangPengajar($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'bahanTayang' => 'required|mimes:zip,rar',
        ]);

        $extension = $request->file('bahanTayang')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('bahanTayang')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);


    }
    public function fill_LaporandanBahanTayangSeminarPeserta($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'laporanBahanTayangSeminar' => 'required|mimes:pdf,docx,zip,rar',
        ]);

        $extension = $request->file('laporanBahanTayangSeminar')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('laporanBahanTayangSeminar')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);

    }
    public function fill_BiodataPengajar($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'biodataPengajar' => 'required|mimes:pdf,docx,zip,rar',
        ]);

        $extension = $request->file('biodataPengajar')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('biodataPengajar')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);

    }
    public function fill_AbsensiPeserta($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'absensiPeserta' => 'required|mimes:pdf,docx,zip,rar',
        ]);

        $extension = $request->file('absensiPeserta')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('absensiPeserta')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);


    }
    public function fill_AbsensiPengajar($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'absensiPengajar' => 'required|mimes:pdf,docx,zip,rars',
        ]);

        $extension = $request->file('absensiPengajar')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('absensiPengajar')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);


    }
    public function fill_FormPenilaianSikapPerilaku($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'formPenilaian' => 'required|mimes:xls,xlsx',
        ]);

        $extension = $request->file('formPenilaian')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('formPenilaian')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);


    }
    public function fill_SuratUndanganRapatEvaluasi($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'waktu' => 'required', 
            'zoom_id' => 'required',
            'passcode' => 'required',
            'req_udRapat' => 'required|mimes:xls,xlsx',
            ]);

        // dd($request->file('file'));

        $file = $request->file('req_udRapat');

        // get collection from each row
        $req = Excel::toCollection(new UserImport, $file);
        $req = $req[0]->map(function($row) {
            return [
                'tim_pengajar' => $row[0],
                'tim_pusbangkom' => $row[2],
                'tim_bapekom' => $row[4],
                'tembusan' => $row[6],
            ];
        });

        // dd($req);

        $req = $req->toArray();

        $pelatihan = PelatihanModel::find($id_pl);
        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);

        $path = public_path().'/assets/images/pupr.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/'. $type . ';base64,'. base64_encode($data);

        // Kirim objek $request bersama dengan data lainnya ke tampilan HTML
        $data = [
            'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan,
            'request' => $request,
            'logo' => $logo,
            'data' => $req,
        ];

        // Tampilkan view HTML dengan nilai-nilai dari objek $request
        $html_content = view('dokumen.cetak.' . $nama_fungsi, $data)->render();

        $pdf = new Dompdf();
        $pdf->loadHtml($html_content);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdf_content = $pdf->output();
        return view('dokumen.previewDokumenCetak', ['pdf_content' => $pdf_content,'pelatihan' => $pelatihan,
        'kegiatan' => $kegiatanTahapan, 'nama_fungsi' => $nama_fungsi, 'kegiatan' => $kegiatanTahapan]);

    }
    public function fill_BeritaAcaraKelulusan($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'kata_ganti' => 'required',
            'nama_yth' => 'required',
            'lokasi' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required', 
            'zoom_id' => 'required',
            'passcode' => 'required',
        ]);
    
        $pelatihan = PelatihanModel::find($id_pl);
        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
    
        $path = public_path().'/assets/images/pupr.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/'. $type . ';base64,'. base64_encode($data);
    
        // Kirim objek $request bersama dengan data lainnya ke tampilan HTML
        $data = [
            'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan,
            'request' => $request,
            'logo' => $logo,
        ];
    
        // Tampilkan view HTML dengan nilai-nilai dari objek $request
        $html_content = view('dokumen.cetak.' . $nama_fungsi, $data)->render();
    
    
        $pdf = new Dompdf();
        $pdf->loadHtml($html_content);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        $pdf_content = $pdf->output();
        return view('dokumen.preview.' . $nama_fungsi, ['pdf_content' => $pdf_content,'pelatihan' => $pelatihan,
        'kegiatan' => $kegiatanTahapan, 'nama_fungsi' => $nama_fungsi]);
    
        
        
        // Tampilkan PDF atau simpan PDF ke dalam file
        return $pdf->stream(); // Tampilkan PDF di browser
        // atau
        // return $pdf->save('lokasi_direktori/file.pdf'); // Simpan PDF ke dalam file

    }
    public function fill_SuratPermohonanMenutupdanMenghadiri($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kata_ganti' => 'required',
            'nama_yth' => 'required',
            'lokasi' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required', 
            'zoom_id' => 'required',
            'passcode' => 'required',
            'req_suratPermohonanMenutup' => 'required|mimes:xls,xlsx',
            ]);
    
            $file = $request->file('req_suratPermohonanMenutup');
    
            // get collection from each row
            $req = Excel::toCollection(new UserImport, $file);
            $req = $req[0]->map(function($row) {
                return [
                    'tembusan' => $row[0],
                ];
            });
    
            $req = $req->forget(0);
    
            $pelatihan = PelatihanModel::with('model_pelatihan')->find($id_pl);
            $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
            $nama_kegiatan = $kegiatanTahapan->dokumen;
            $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
    
            $path = public_path().'/assets/images/pupr.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $logo = 'data:image/'. $type . ';base64,'. base64_encode($data);
    
            // Kirim objek $request bersama dengan data lainnya ke tampilan HTML
            $data = [
                'pelatihan' => $pelatihan,
                'kegiatan' => $kegiatanTahapan,
                'request' => $request,
                'logo' => $logo,
                'data' => $req,
            ];
    
            // Tampilkan view HTML dengan nilai-nilai dari objek $request
            $html_content = view('dokumen.cetak.' . $nama_fungsi, $data)->render();
    
            $pdf = new Dompdf();
            $pdf->loadHtml($html_content);
            $pdf->setPaper('A4', 'portrait');
            $pdf->render();
    
            $pdf_content = $pdf->output();
            return view('dokumen.previewDokumenCetak', ['pdf_content' => $pdf_content,'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan, 'nama_fungsi' => $nama_fungsi, 'kegiatan' => $kegiatanTahapan]);
    }
    public function fill_SuratUndanganMenghadiriPenutupan($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kata_ganti' => 'required',
            'nama_yth' => 'required',
            'waktu_mulai' => 'required',
            'zoom_id' => 'required',
            'passcode' => 'required',
            'req_suratUndanganMenghadiriPenutupan' => 'required|mimes:xls,xlsx',
            ]);
    
            $file = $request->file('req_suratUndanganMenghadiriPenutupan');
    
            // get collection from each row
            $req = Excel::toCollection(new UserImport, $file);
            $req = $req[0]->map(function($row) {
                return [
                    'tembusan' => $row[0],
                ];
            });
    
            $req = $req->forget(0);
    
            $pelatihan = PelatihanModel::with('model_pelatihan')->find($id_pl);
            $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
            $nama_kegiatan = $kegiatanTahapan->dokumen;
            $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
    
            $path = public_path().'/assets/images/pupr.png';
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $logo = 'data:image/'. $type . ';base64,'. base64_encode($data);
    
            // Kirim objek $request bersama dengan data lainnya ke tampilan HTML
            $data = [
                'pelatihan' => $pelatihan,
                'kegiatan' => $kegiatanTahapan,
                'request' => $request,
                'logo' => $logo,
                'data' => $req,
            ];
    
            // Tampilkan view HTML dengan nilai-nilai dari objek $request
            $html_content = view('dokumen.cetak.' . $nama_fungsi, $data)->render();
    
            $pdf = new Dompdf();
            $pdf->loadHtml($html_content);
            $pdf->setPaper('A4', 'portrait');
            $pdf->render();
    
            $pdf_content = $pdf->output();
            return view('dokumen.previewDokumenCetak', ['pdf_content' => $pdf_content,'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan, 'nama_fungsi' => $nama_fungsi, 'kegiatan' => $kegiatanTahapan]);

    }
    public function fill_SambutanPenutupanKepalaPusat($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'sambutanPenutupanKapus' => 'required|mimes:docx,pdf',
        ]);

        $extension = $request->file('sambutanPenutupanKapus')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('sambutanPenutupanKapus')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);
    }
    public function fill_LaporanPenutupan($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'kata_ganti' => 'required',
            'nama_yth' => 'required',
            'lokasi' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required', 
            'zoom_id' => 'required',
            'passcode' => 'required',
        ]);
    
        $pelatihan = PelatihanModel::find($id_pl);
        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
    
        $path = public_path().'/assets/images/pupr.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/'. $type . ';base64,'. base64_encode($data);
    
        // Kirim objek $request bersama dengan data lainnya ke tampilan HTML
        $data = [
            'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan,
            'request' => $request,
            'logo' => $logo,
        ];
    
        // Tampilkan view HTML dengan nilai-nilai dari objek $request
        $html_content = view('dokumen.cetak.' . $nama_fungsi, $data)->render();
    
    
        $pdf = new Dompdf();
        $pdf->loadHtml($html_content);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
    
        $pdf_content = $pdf->output();
        return view('dokumen.preview.' . $nama_fungsi, ['pdf_content' => $pdf_content,'pelatihan' => $pelatihan,
        'kegiatan' => $kegiatanTahapan, 'nama_fungsi' => $nama_fungsi]);
    
        
        
        // Tampilkan PDF atau simpan PDF ke dalam file
        // return $pdf->stream(); // Tampilkan PDF di browser
        // atau
        // return $pdf->save('lokasi_direktori/file.pdf'); // Simpan PDF ke dalam file

    }
    public function fill_DokumentasiCeremonyPenutupan($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'dokumentasiCeremony' => 'required|mimes:jpg,jpeg,zip,rar',
        ]);

        $extension = $request->file('dokumentasiCeremony')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('dokumentasiCeremony')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);


    }
    public function fill_SuratPengembalianPeserta($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'req_pengembalian' => 'required|mimes:xls,xlsx',
        ]);

        // dd($request->file('file'));

        $file = $request->file('req_pengembalian');

        // get collection from each row
        $req = Excel::toCollection(new UserImport, $file);
        $req = $req[0]->map(function($row) {
            return [
                'no' => $row[0],
                'nama' => $row[1],
                'nip/nrp' => $row[2],
                'unit_kerja' => $row[3],
                'peringkat' => $row[4],
                'unit_kerja_pengutus'=> $row[6],
                'tembusan' => $row[8],
            ];
        });

        $req = $req->toArray();

        $pelatihan = PelatihanModel::find($id_pl);
        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);

        $path = public_path().'/assets/images/pupr.png';
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $logo = 'data:image/'. $type . ';base64,'. base64_encode($data);

        // Kirim objek $request bersama dengan data lainnya ke tampilan HTML
        $data = [
            'pelatihan' => $pelatihan,
            'kegiatan' => $kegiatanTahapan,
            'request' => $request,
            'logo' => $logo,
            'data' => $req,
        ];

        // Tampilkan view HTML dengan nilai-nilai dari objek $request
        $html_content = view('dokumen.cetak.' . $nama_fungsi, $data)->render();

        // $options = new Options();
        // $options->set('isHtml5ParserEnabled', true);
        // $options->set('isCssFloatEnabled', true);

        $pdf = new Dompdf();
        $pdf->loadHtml($html_content);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdf_content = $pdf->output();
        return view('dokumen.previewDokumenCetak', ['pdf_content' => $pdf_content,'pelatihan' => $pelatihan,
        'kegiatan' => $kegiatanTahapan, 'nama_fungsi' => $nama_fungsi, 'kegiatan' => $kegiatanTahapan]);


        // dd($data);

        // $pelatihan = PelatihanModel::find($id_pl);

        // return view('dokumen.cetak.SuratPengembalianPeserta', compact('data'), [
        //     'pelatihan' => $pelatihan, 'id_pelatihan' => $id_pl, 'request' => $request,
        // ]);

    }
    public function fill_SPMK($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'spmk' => 'required|mimes:docx,pdf',
        ]);

        $extension = $request->file('spmk')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('spmk')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);


    }
    public function fill_LaporanAkhirPelatihan($id_pl, $id_kthp, Request $request)
    {
        $request->validate([
            'laporanAkhir' => 'required|mimes:docx,pdf',
        ]);

        $extension = $request->file('laporanAkhir')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.' . $extension;

        $request->file('laporanAkhir')->move(public_path('assets/dokumen'), $fileName);

        // Ambil record terakhir dari tabel
        $lastRecord = DetilStatusModel::latest('id')->first();
        // Inisialisasi angka awal
        $number = 1;
        if ($lastRecord) {
            $lastNumber = intval(substr($lastRecord->id, 3));
            $number = ($lastNumber < 999) ? $lastNumber + 1 : 1;
        }
        // Format ulang ID dengan 'BP' diikuti oleh angka yang telah diincrement
        $newId = 'DST' . str_pad($number, 5, '0', STR_PAD_LEFT);

        $status = StatusModel::where('id_pelatihan', $id_pl)->first();


        // Tambahkan ID yang telah diincrement ke dalam request
        $requestData = [];
        $requestData['id'] = $newId;
        $requestData['id_status'] = $status->id;
        $requestData['id_kegiatan_tahapan'] = $id_kthp;
        $requestData['file'] = $fileName; 
        $requestData['keterangan'] = 'Disetujui';
        

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah diupload', 'popUp_title' => 'Added!']);
    }
}