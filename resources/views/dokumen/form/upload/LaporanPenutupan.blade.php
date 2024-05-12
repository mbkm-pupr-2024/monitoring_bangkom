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
                                <form action="{{ route('upload-'. $nama_fungsi, ['id_pl' => $pelatihan->id, 'id_kthp' => $kegiatan->id]) }}" method="POST" enctype="multipart/form-data" id="form_penutupan">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="tanggal" class="form-label">Tanggal Pelaksanaan</label>
                                        <input id="tanggal" class="form-control flatpickr1" type="text" placeholder="Pilih tanggal.." name="tanggal">
                                    </div>
                                    <div class="mb-4">
                                        <label for="kepala_bpsdm" class="form-label">Nama Plt. Kepala Badan Pengembangan SDM</label>
                                        <input type="text" class="form-control" id="kepala_bpsdm" name="kepala_bpsdm">
                                    </div>                                    
                                    <div class="mb-4">
                                        <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                                        <input type="text" class="form-control" id="jumlah_peserta" name="jumlah_peserta">
                                    </div>                                    
                                    <div class="mb-4">
                                        <label for="jumlah_peserta_hadir" class="form-label">Jumlah Peserta yang Hadir</label>
                                        <input type="text" class="form-control" id="jumlah_peserta_hadir" name="jumlah_peserta_hadir">
                                    </div>                                                                        
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="peserta_male" class="form-label">Laki-laki</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="peserta_male" name="peserta_male" aria-describedby="basic-addon2">
                                                <span class="input-group-text" id="basic-addon2">orang</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <label for="peserta_female" class="form-label">Perempuan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="peserta_female" name="peserta_female" aria-describedby="basic-addon2">
                                                <span class="input-group-text" id="basic-addon2">orang</span>
                                            </div>
                                        </div>  
                                    </div>
                                    <br>
                                    
                                    <div class="mb-4">
                                        <label for="req_laporanPenutupan" class="form-label">Upload Requirement</label>
                                        <input type="file" class="form-control" id="req_laporanPenutupan" name="req_laporanPenutupan" accept=".xls, .xlsx">
                                    </div>
                                    <p>Download template berikut untuk mengisi requirement: 
                                        @if ($pelatihan->model_pelatihan->id == 'MP001')
                                            <a href="{{ route('download-template', ['file' => 'req_laporanPenutupan_MP001']) }}">Unduh template</a>
                                        @elseif($pelatihan->model_pelatihan->id == 'MP002')
                                            <a href="{{ route('download-template', ['file' => 'req_laporanPenutupan_MP002']) }}">Unduh template</a>
                                        @elseif($pelatihan->model_pelatihan->id == 'MP003')
                                            <a href="{{ route('download-template', ['file' => 'req_laporanPenutupan_MP003']) }}">Unduh template</a>
                                        @endif
                                    </p>
                                    <br>
                                    <div class="mb-4">
                                        <div class="form-group">
                                            <label for="pantun">Pantun Penutup</label>
                                            <textarea class="form-control" id="pantun" form="form_penutupan" rows="4" name="pantun"></textarea>
                                        </div>
                                    </div>
                                    
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
