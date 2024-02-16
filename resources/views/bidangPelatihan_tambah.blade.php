@extends('layout.navbar')

@section('style')
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
@endsection

@section('sidebar')
@include('layout.sidebar')
@endsection

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Tambah Bidang Pelatihan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card widget">
                        <div class="card card-body">
                            <div class="widget-stats-container">
                                <form action="/bidang-pelatihan/tambah" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="nama_bidang" class="form-label">Nama Bidang Pelatihan</label>
                                        <input type="text" class="form-control" id="nama_bidang" name="bidang_pelatihan">
                                    </div>
                                    <div class="mb-4">
                                        <label for="gambar_bidang" class="form-label">Gambar Bidang Pelatihan</label>
                                        <input type="text" class="form-control" id="gambar_bidang" name="gambar">
                                    </div>
                                    <div class="mb-4">
                                        <button class="btn btn-primary float-end" type="submit">Tambah</button>
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
@endsection
