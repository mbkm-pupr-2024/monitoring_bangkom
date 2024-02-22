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
                        <h1>Arsip Pelatihan</h1>
                    </div>
                </div>
            </div>
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif
            <div class="row">
                @foreach ($pelatihans as $pelatihan)
                <div class="col-12">
                    <div class="card widget widget-popular-blog">
                        
                        <div class="card-body">
                            <span class="badge badge-style-light rounded-pill badge-success float-end">Selesai</span>
                            <div class="widget-popular-blog-container">
                                <div class="widget-popular-blog-image">
                                    <img src="{{ asset('assets/images/bidang_pelatihan/' . $pelatihan->bidang_pelatihan->gambar) }}" alt="{{ $pelatihan->nama }}">
                                </div>
                                <div class="widget-popular-blog-content ps-4">
                                    <span class="widget-popular-blog-title">
                                        {{ $pelatihan->nama }}
                                    </span>
                                    <span class="widget-popular-blog-title text-black-50">
                                        {{ $pelatihan->bidang_pelatihan->nama }}
                                    </span>
                                </div>
                            </div>
                            <div class="widget-popular-blog-container">
                                <span class="">
                                    <i class="material-icons">schedule</i>
                                    {{ date('d F Y', strtotime($pelatihan->tanggal_mulai)) }} - {{ date('d F Y', strtotime($pelatihan->tanggal_selesai)) }}
                                </span>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/pelatihan/status/{{ $pelatihan->id }}" class="btn btn-primary btn-sm float-end">Cek Status</a>
                        </div>
                    </div>
                </div>
                @endforeach
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

