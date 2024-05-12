@extends('layout.navbar')

@section('style')
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Tambah Jadwal Pelatihan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card widget">
                        <div class="card card-body">
                            <div class="widget-stats-container">
                                <form action="/jadwal-pelatihan/tambah" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="nama_pelatihan" class="form-label">Nama Pelatihan</label>
                                        <input type="text" class="form-control" id="nama_pelatihan" name="nama" value="{{ old('nama') }}" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="jenis_pelatihan" class="form-label">Jenis Pelatihan</label>
                                        <select class="js-states form-control" id="jenis_pelatihan" tabindex="-1" style="display:none;width: 100%" name="id_jenis" required>
                                            <option value="">---Pilih jenis pelatihan---</option>
                                            @foreach ($jeniss as $jenis)
                                                <option value="{{ $jenis->id }}" {{ old('id_jenis' == $jenis->id ? 'selected' : '') }}>{{ $jenis->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="bidang_pelatihan" class="form-label">Bidang Pelatihan</label>
                                        <select class="js-states form-control" id="bidang_pelatihan" tabindex="-1" style="display:none;width: 100%" name="id_bidang" required>
                                            <option value="">---Pilih bidang pelatihan---</option>
                                            @foreach ($bidangs as $bidang)
                                                <option value="{{ $bidang->id }}" {{ old('id_bidang' == $bidang->id ? 'selected' : '') }}>{{ $bidang->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="model_pelatihan" class="form-label">Model Pelatihan</label>
                                        <select class="js-states form-control" id="model_pelatihan" tabindex="-1" style="display:none;width: 100%" name="id_model" required>
                                            <option value="">---Pilih model pelatihan---</option>
                                            @foreach ($models as $model)
                                                <option value="{{ $model->id }}" {{ old('id_model' == $model->id ? 'selected' : '') }}>{{ $model->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                        <input id="tanggal_mulai" class="form-control flatpickr1" type="text" placeholder="Pilih tanggal.." name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                        <input id="tanggal_selesai" class="form-control flatpickr1" type="text" placeholder="Pilih tanggal.." name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="tahun_periode" class="form-label">Tahun Periode</label>
                                        <input id="tahun_periode" class="form-control" type="number" name="tahun_periode" value="{{ old('tahun_periode'),date('Y') }}" required>
                                    </div>
                                    <div class="mb-4">
                                        <button class="btn btn-success float-end" type="submit">Tambah</button>
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
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/select2.js') }}"></script>
<script src="{{ asset('assets/plugins/flatpickr/flatpickr.js') }}"></script>
<script src="{{ asset('assets/js/pages/datepickers.js') }}"></script>
<script>
$('select').select2();
<script>
@endsection
