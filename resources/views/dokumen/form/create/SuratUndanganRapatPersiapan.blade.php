@extends('layout.navbar')

@section('style')
<link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
@endsection

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
                                
                                <form action="{{ route('create-'. $nama_fungsi, ['id_pl' => $pelatihan->id, 'id_kthp' => $kegiatan->id]) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
                                    </div>
                                    <h6>Menindaklanjuti:</h6>
                                    <div class="mb-4">
                                        <label for="surat_perintah" class="form-label">Surat Perintah</label>
                                        <input type="text" class="form-control" id="surat_perintah" name="surat_perintah">
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="nomor_surat_perintah" class="form-label">Nomor Surat Perintah</label>
                                            <input type="text" class="form-control" id="nomor_surat_perintah" name="nomor_surat_perintah">
                                        </div>
                                        <div class="col-6">
                                            <label for="tanggal_surat_perintah" class="form-label">Tanggal Surat Perintah</label>
                                            <input id="tanggal_surat_perintah" class="form-control flatpickr1" type="text" placeholder="Pilih tanggal.." name="tanggal_surat_perintah">
                                        </div> 
                                    </div>
                                    <br>
                                    <div class="mb-4">
                                        <label for="hal_surat_perintah" class="form-label">Hal</label>
                                        <input type="text" class="form-control" id="hal_surat_perintah" name="hal_surat_perintah">
                                    </div>                                                               
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="tanggal" class="form-label">Tanggal Pelaksanaan</label>
                                            <input id="tanggal" class="form-control flatpickr1" type="text" placeholder="Pilih tanggal.." name="tanggal">
                                        </div>
                                        <div class="col-6">
                                            <label for="waktu_mulai" class="form-label">Waktu Mulai</label>
                                            <input id="waktu_mulai" class="form-control" type="time" name="waktu_mulai">
                                        </div>  
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
                                        <label for="req_udRapat" class="form-label">Upload Requirement</label>
                                        <input type="file" class="form-control" id="req_udRapat" name="req_udRapat" accept=".xls, .xlsx">
                                    </div>
                                    <p>Download requirement berikut untuk mengisi requirement diatas: 
                                        <a href="{{ route('download-requirement', ['file' => 'req_suratUndanganRapatPersiapan']) }}">Unduh requirement</a>
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
<script src="{{ asset('assets/plugins/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/js/pages/datepickers.js') }}"></script>
@endsection