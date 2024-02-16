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
                        <h1>Edit Pelatihan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card widget">
                        <div class="card card-body">
                            <div class="widget-stats-container">
                                <form action="/pelatihan/edit/{{ $pelatihan->id }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="nama_pelatihan" class="form-label">Nama Pelatihan</label>
                                        <input type="text" class="form-control" id="nama_pelatihan" name="pelatihan" value="{{ $pelatihan->pelatihan }}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="bidang_pelatihan" class="form-label">Bidang Pelatihan</label>
                                        <select class="js-states form-control" id="bidang_pelatihan" tabindex="-1" style="display:none;width: 100%" name="bidang_pelatihan">
                                            
                                            @foreach ($bidangPelatihan as $bidang)
                                                <option value="{{ $bidang->id }}" {{ $pelatihan->bidang_pelatihan == $bidang->id ? 'selected': '' }}>{{ $bidang->bidang_pelatihan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                        <input id="tanggal_mulai" class="form-control flatpickr1" type="text" placeholder="Select Date.." name="tanggal_mulai" value="{{ $pelatihan->tanggal_mulai }}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                        <input id="tanggal_selesai" class="form-control flatpickr1" type="text" placeholder="Select Date.." name="tanggal_selesai" value="{{ $pelatihan->tanggal_selesai }}">
                                    </div>
                                    <div class="mb-4">
                                        <button class="btn btn-success float-end" type="submit">Edit</button>
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
