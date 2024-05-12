@extends('layout.navbar')

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1 class="mb-2">{{ $kegiatan->dokumen }}</h1>
                        <h5 class="text-muted">Pelatihan {{ $pelatihan->nama }}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card widget">
                        <div class="card card-body">
                            <div class="widget-stats-container">
                                <form action="{{ route('upload-'. $nama_fungsi, ['id_pl' => $pelatihan->id, 'id_kthp' => $kegiatan->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
                                    </div> 
                                    <h6>Kepada:</h6>
                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kata_ganti" id="bapak" value="Bapak" checked>
                                            <label class="form-check-label" for="bapak">
                                              Bapak
                                            </label>
                                          </div>
                                          <div class="form-check">
                                            <input class="form-check-input" type="radio" name="kata_ganti" id="ibu" value="Ibu">
                                            <label class="form-check-label" for="ibu">
                                              Ibu
                                            </label>
                                          </div>
                                    </div>
                                    <div class="mb-4">
                                        <label for="nama_yth" class="form-label">Penerima</label>
                                        <input type="text" class="form-control" id="nama_yth" name="nama_yth">
                                    </div>                                    
                                    <div class="mb-4">
                                        <label for="lokasi" class="form-label">Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi">
                                    </div>                                    
                                    <div class="mb-4">
                                        <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                            <input id="waktu_mulai" class="form-control" type="time" name="waktu_mulai">
                                    </div>                                    
                                    <br>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="zoom_id" class="form-label">Zoom Meeting ID</label>
                                            <input type="text" class="form-control" id="zoom_id" name="zoom_id">
                                            
                                        </div>
                                        <div class="col-6">
                                            <label for="passcode" class="form-label">Passcode</label>
                                            <input type="text" class="form-control" id="passcode" name="passcode">
                                        </div>  
                                    </div>
                                    <br>
                                    <div class="mb-4">
                                        <label for="req_suratPermohonanMenutup" class="form-label">Upload Requirement</label>
                                        <input type="file" class="form-control" id="req_suratPermohonanMenutup" name="req_suratPermohonanMenutup" accept=".xls, .xlsx">
                                    </div>
                                    <p>Download template berikut untuk mengisi requirement: 
                                        <a href="{{ route('download-template', ['file' => 'req_suratPermohonanMenutupdanMenghadiri']) }}">Unduh template</a>
                                    </p>
                                    <br>
                                    <div class="mb-4">
                                        <button class="btn btn-success float-end" type="submit">Cetak surat</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
