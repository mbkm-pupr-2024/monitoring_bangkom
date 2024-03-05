@extends('layout.navbar')

@section('style')
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
@endsection

@section('sidebar')
@include('layout.sidebar')
@endsection

@section('content')
@if(Session::has('success'))
        <script>
            Swal.fire({
                // title:'Success!',
                title:'{{ Session::get('popUp_title') }}',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
@endif
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Pelatihan Sedang Berlangsung</h1>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <input type="text" id="searchInput" class="form-control" placeholder="Cari Pelatihan...">
                </div>
            </div>
            <div class="row">
                @if (!$pelatihans->isEmpty())
                    @foreach ($pelatihans as $pelatihan)
                        <div class="col-12">
                            <div class="card widget widget-popular-blog">
                                <div class="card-body">
                                    @auth('admin')
                                    <a onclick="hapus_button_{{ $pelatihan->id }}();" class="btn btn-danger btn-sm m-1 float-end"><i class="material-icons-outlined">delete</i></a>
                                    @endauth
                                    <div class="widget-popular-blog-container">
                                        <div class="widget-popular-blog-image">
                                            <img src="{{ asset('assets/images/bidang_pelatihan/' . $pelatihan->bidang_pelatihan->gambar) }}" alt="{{ $pelatihan->nama }}">
                                        </div>
                                        <div class="widget-popular-blog-content ps-4">
                                            <span class="widget-popular-blog-title">
                                                {{ $pelatihan->nama }}
                                            </span>
                                            <span class="widget-popular-blog-title text-black-50">
                                                    <i class="material-icons">schedule</i>
                                                    {{ date('d F Y', strtotime($pelatihan->tanggal_mulai)) }} - {{ date('d F Y', strtotime($pelatihan->tanggal_selesai)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="widget-popular-blog-container">
                                        <span>
                                            <b>Jenis pelatihan: </b>{{ $pelatihan->jenis_pelatihan->nama }}
                                        </span>
                                    </div>
                                    <div class="widget-popular-blog-container">
                                        <span class="">
                                            <b>Bidang pelatihan: </b>{{ $pelatihan->bidang_pelatihan->nama }}
                                        </span>
                                    </div>
                                    <div class="widget-popular-blog-container">
                                        <span class="">
                                            <b>Model pelatihan: </b>{{ $pelatihan->model_pelatihan->nama }}
                                        </span>
                                    </div>
                                    <br>
                                    <p>
                                        @if (isset($status_terakhir[$pelatihan->id]))
                                            <b>Status:</b> {{ $status_terakhir[$pelatihan->id] }}
                                        @else
                                            <b>Status:</b> Belum ada progres
                                        @endif
                                    </p>

                                </div>
                                <div class="card-footer">
                                    <script>
                                        function hapus_button_{{ $pelatihan->id }}() {
                                            Swal.fire({
                                            title: "Konfirmasi Penghapusan",
                                            text: "Apakah Anda yakin ingin menghapus data ini? ",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonColor: "#3085d6",
                                            cancelButtonText: "Batal",
                                            cancelButtonColor: "#d33",
                                            confirmButtonText: "Hapus"
                                            }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = "/pelatihan/hapus/{{ $pelatihan->id }}";
                                            }
                                            });
                                        }
                                    </script>
                                    <a href="/pelatihan/cek-status/{{ $pelatihan->id }}" class="btn btn-primary btn-sm float-end">Cek Status</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <div class="card widget widget-popular-blog">
                            <div class="card-body text-center">
                                <h5 style="color:#8b8e95">Belum ada pelatihan yang berlangsung</h5>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        // Inisialisasi Select2 untuk fitur pencarian
        $('#searchInput').select2({
            placeholder: "Cari Pelatihan...",
            allowClear: true
        });
    });
</script>
@endsection
