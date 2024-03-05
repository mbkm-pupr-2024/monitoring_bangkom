@extends('layout.navbar')

@section('style')
<link href="{{ asset('assets/plugins/datatables/datatables.min.css') }}" rel="stylesheet">
@endsection

@section('sidebar')
@include('layout.sidebar')
@endsection

@section('content')
<div class="app-content">
    @if(Session::has('success'))
        <p>ok</p>
        <script>
            Swal.fire({
                title: '{{ Session::get('popUp_title') }}',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <div class="content-wrapper">
        <div class="container">
            <div class="card widget widget-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="settings-security-two-factor">
                                <h5><u>Detail Pelatihan</u></h5> 
                                <div class="row">
                                    <div class="col-8">
                                        <p><b>Nama Pelatihan:</b> {{ $pelatihan->nama }}</p>
                                        <p><b>Jenis Pelatihan:</b> {{ $pelatihan->jenis_pelatihan->nama}}</p>
                                        <p><b>Bidang Pelatihan:</b> {{ $pelatihan->bidang_pelatihan->nama}}</p>
                                        <p><b>Model Pelatihan:</b> {{ $pelatihan->model_pelatihan->nama}}</p>
                                    </div>
                                    <div class="col-4">
                                        <p><b>Tanggal Mulai:</b> {{ $pelatihan->tanggal_mulai}}</p>
                                        <p><b>Tanggal Selesai:</b> {{ $pelatihan->tanggal_selesai}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="widget-info-container">
                                <div class="widget-info-image" >
                                    <img class="mt-5" src="{{ asset('assets/images/surat/surat_pemanggilan.png') }}" width=100 alt="">
                                </div>
                                <h5 class="widget-info-title">Surat Pemanggilan Peserta</h5>
                                <a href="/cetak-surat/pemanggilan-peserta/pelatihan-{{ $pelatihan->id }}" class="btn btn-primary widget-info-action no-m-b mt-2">Cetak</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="widget-info-container">
                                <div class="widget-info-image" >
                                    <img class="mt-5" src="{{ asset('assets/images/surat/surat_pengembalian.png') }}" width=100 alt="">
                                </div>
                                <h5 class="widget-info-title">Surat Pengembalian Peserta</h5>
                                <a href="/cetak-surat/pengembalian-peserta/pelatihan-{{ $pelatihan->id }}" class="btn btn-primary widget-info-action no-m-b mt-2">Cetak</a>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="widget-info-container">
                                <div class="widget-info-image" >
                                    <img class="mt-5" src="{{ asset('assets/images/surat/surat_keputusan.png') }}" width=100 alt="">
                                </div>
                                <h5 class="widget-info-title">Surat Keputusan Pelatihan</h5>
                                <a href="/cetak-surat/keputusan-pelatihan/pelatihan-{{ $pelatihan->id }}" class="btn btn-primary widget-info-action no-m-b mt-2">Cetak</a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="widget-info-container">
                                <div class="widget-info-image" >
                                    <img class="mt-5" src="{{ asset('assets/images/surat/surat_permohonan_kehadiran.png') }}" width=100 alt="">
                                </div>
                                <h5 class="widget-info-title">Surat Permohonan Kehadiran Pembukaan</h5>
                                <a href="/cetak-surat/permohonan-kehadiran-pembukaan/pelatihan-{{ $pelatihan->id }}" class="btn btn-primary widget-info-action no-m-b mt-2">Cetak</a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="widget-info-container">
                                <div class="widget-info-image" >
                                    <img class="mt-5" src="{{ asset('assets/images/surat/surat_permohonan_kehadiran.png') }}" width=100 alt="">
                                </div>
                                <h5 class="widget-info-title">Surat Permohonan Kehadiran Penutupan</h5>
                                <a href="/cetak-surat/permohonan-kehadiran-penutupan/pelatihan-{{ $pelatihan->id }}" class="btn btn-primary widget-info-action no-m-b mt-2">Cetak</a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="widget-info-container">
                                <div class="widget-info-image" >
                                    <img class="mt-5" src="{{ asset('assets/images/surat/surat_permohonan_sambutan.png') }}" width=100 alt="">
                                </div>
                                <h5 class="widget-info-title">Surat Permohonan Sambutan Pembukaan</h5>
                                <a href="/cetak-surat/permohonan-sambutan-pembukaan/pelatihan-{{ $pelatihan->id }}" class="btn btn-primary widget-info-action no-m-b mt-2">Cetak</a>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="widget-info-container">
                                <img class="mt-5" src="{{ asset('assets/images/surat/surat_permohonan_sambutan.png') }}" width=100 alt="">
                                <h5 class="widget-info-title">Surat Permohonan Sambutan Penutupan</h5>
                                <a href="/cetak-surat/permohonan-sambutan-penutupan/pelatihan-{{ $pelatihan->id }}" class="btn btn-primary widget-info-action no-m-b mt-2">Cetak</a>
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
<script src="{{ asset('assets/plugins/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
@endsection

