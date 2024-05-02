<?php

namespace App\Http\Controllers;

use App\Imports\UserImport;
use App\Models\StatusModel;
use Illuminate\Http\Request;
use App\Models\PelatihanModel;
use App\Models\DetilStatusModel;
use App\Models\KegiatantahapanModel;
use Maatwebsite\Excel\Facades\Excel;

class PrintDokumenController extends Controller
{
    ////////////////////////////// PRINT THE DOCUMENT////////////////////////////////////

    public function print_SuratUndanganRapatPersiapan($id_pl, $id_kthp, Request $request)
{
    // $extension = $request->file('formBiodata')->extension();
    $fileName = $id_pl . '_' . $id_kthp . '.pdf';

    // Ambil konten PDF dari request dan simpan ke file
    $pdf_content = base64_decode($request->pdf_content);
    file_put_contents(public_path('assets/dokumen/' . $fileName), $pdf_content);

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
    $requestData['keterangan'] = 'Terkirim';

    // Buat record baru menggunakan metode create
    DetilStatusModel::create($requestData);

    return redirect('/status-dokumen')->with(['success' => 'Dokumen telah dikirim dan sedang menunggu persetujuan', 'popUp_title' => 'Sended!']);
}

    public function print_NotulenRapatPersiapan($id_pl, $id_kthp, Request $request)
    {

        // $extension = $request->file('formBiodata')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.pdf';

        // Ambil konten PDF dari request dan simpan ke file
        $pdf_content = base64_decode($request->pdf_content);
        file_put_contents(public_path('assets/dokumen/' . $fileName), $pdf_content);

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
        $requestData['keterangan'] = 'Terkirim';

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah dikirim dan sedang menunggu persetujuan', 'popUp_title' => 'Sended!']);
        

    }
    public function print_PedomanPelatihan($id_pl, $id_kthp, Request $request)
    {

        $pelatihan = PelatihanModel::find($id_pl);

        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
        return view('dokumen.cetak.' . $nama_fungsi, [
            'pelatihan' => $pelatihan,'kegiatan' => $kegiatanTahapan,'request' => $request,
        ]);

    }
    public function print_SuratPemanggilanPeserta($id_pelatihan, Request $request)
    {
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

        $pelatihan = PelatihanModel::find($id_pelatihan);

        return view('dokumen.pemanggilan_peserta', compact('data'), [
            'pelatihan' => $pelatihan, 'id_pelatihan' => $id_pelatihan, 'request' => $request,
        ]);
    }
    public function print_SKPelatihan($id_pl, $id_kthp, Request $request)
    {
        $pelatihan = PelatihanModel::find($id_pl);

        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
        return view('dokumen.cetak.' . $nama_fungsi, [
            'pelatihan' => $pelatihan,'kegiatan' => $kegiatanTahapan,'request' => $request,
        ]);

    }
    public function print_SuratPermohonanMembukadanMenghadiri($id_pl, $id_kthp, Request $request)
    {
        // $extension = $request->file('formBiodata')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.pdf';

        // Ambil konten PDF dari request dan simpan ke file
        $pdf_content = base64_decode($request->pdf_content);
        file_put_contents(public_path('assets/dokumen/' . $fileName), $pdf_content);

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
        $requestData['keterangan'] = 'Terkirim';

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah dikirim dan sedang menunggu persetujuan', 'popUp_title' => 'Sended!']);

        }
    public function print_SuratUndanganMenghadiriPembukaan($id_pl, $id_kthp, Request $request)
    {
        // $extension = $request->file('formBiodata')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.pdf';

        // Ambil konten PDF dari request dan simpan ke file
        $pdf_content = base64_decode($request->pdf_content);
        file_put_contents(public_path('assets/dokumen/' . $fileName), $pdf_content);

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
        $requestData['keterangan'] = 'Terkirim';

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah dikirim dan sedang menunggu persetujuan', 'popUp_title' => 'Sended!']);

    }
    public function print_LaporanPembukaan($id_pl, $id_kthp, Request $request)
    {
        $pelatihan = PelatihanModel::find($id_pl);

        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
        return view('dokumen.cetak.' . $nama_fungsi, [
            'pelatihan' => $pelatihan,'kegiatan' => $kegiatanTahapan,'request' => $request,
        ]);

    }
    public function print_SuratUndanganRapatEvaluasi($id_pl, $id_kthp, Request $request)
    {
        // $extension = $request->file('formBiodata')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.pdf';

        // Ambil konten PDF dari request dan simpan ke file
        $pdf_content = base64_decode($request->pdf_content);
        file_put_contents(public_path('assets/dokumen/' . $fileName), $pdf_content);

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
        $requestData['keterangan'] = 'Terkirim';

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah dikirim dan sedang menunggu persetujuan', 'popUp_title' => 'Sended!']);
        

    }
    public function print_BeritaAcaraKelulusan($id_pl, $id_kthp, Request $request)
    {
        // $extension = $request->file('formBiodata')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.pdf';

        // Ambil konten PDF dari request dan simpan ke file
        $pdf_content = base64_decode($request->pdf_content);
        file_put_contents(public_path('assets/dokumen/' . $fileName), $pdf_content);

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
        $requestData['keterangan'] = 'Terkirim';

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah dikirim dan sedang menunggu persetujuan', 'popUp_title' => 'Sended!']);


    }
    public function print_SuratPermohonanMenutupdanMenghadiri($id_pl, $id_kthp, Request $request)
    {
        // $extension = $request->file('formBiodata')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.pdf';

        // Ambil konten PDF dari request dan simpan ke file
        $pdf_content = base64_decode($request->pdf_content);
        file_put_contents(public_path('assets/dokumen/' . $fileName), $pdf_content);

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
        $requestData['keterangan'] = 'Terkirim';

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah dikirim dan sedang menunggu persetujuan', 'popUp_title' => 'Sended!']);
        

    }
    public function print_SuratUndanganMenghadiriPenutupan($id_pl, $id_kthp, Request $request)
    {
        // $extension = $request->file('formBiodata')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.pdf';

        // Ambil konten PDF dari request dan simpan ke file
        $pdf_content = base64_decode($request->pdf_content);
        file_put_contents(public_path('assets/dokumen/' . $fileName), $pdf_content);

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
        $requestData['keterangan'] = 'Terkirim';

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah dikirim dan sedang menunggu persetujuan', 'popUp_title' => 'Sended!']);

    }
    public function print_SambutanPenutupanKepalaPusat($id_pl, $id_kthp, Request $request)
    {
        $pelatihan = PelatihanModel::find($id_pl);

        $kegiatanTahapan = KegiatanTahapanModel::find($id_kthp);
        $nama_kegiatan = $kegiatanTahapan->dokumen;
        $nama_fungsi = str_replace([' ', ',','-'], '', $nama_kegiatan);
        return view('dokumen.cetak.' . $nama_fungsi, [
            'pelatihan' => $pelatihan,'kegiatan' => $kegiatanTahapan,'request' => $request,
        ]);

    }
    public function print_LaporanPenutupan($id_pl, $id_kthp, Request $request)
    {
        // $extension = $request->file('formBiodata')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.pdf';

        // Ambil konten PDF dari request dan simpan ke file
        $pdf_content = base64_decode($request->pdf_content);
        file_put_contents(public_path('assets/dokumen/' . $fileName), $pdf_content);

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
        $requestData['keterangan'] = 'Terkirim';

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah dikirim dan sedang menunggu persetujuan', 'popUp_title' => 'Sended!']);
        

    }
    public function print_SuratPengembalianPeserta($id_pl, $id_kthp, Request $request)
    {
        // $extension = $request->file('formBiodata')->extension();
        $fileName = $id_pl . '_' . $id_kthp . '.pdf';

        // Ambil konten PDF dari request dan simpan ke file
        $pdf_content = base64_decode($request->pdf_content);
        file_put_contents(public_path('assets/dokumen/' . $fileName), $pdf_content);

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
        $requestData['keterangan'] = 'Terkirim';

        // Buat record baru menggunakan metode create
        DetilStatusModel::create($requestData);

        return redirect('/status-dokumen')->with(['success' => 'Dokumen telah dikirim dan sedang menunggu persetujuan', 'popUp_title' => 'Sended!']);
        

    }
}