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
            <div class="row">
                @foreach ($pelatihans as $pelatihan)
                <div class="col-xl-4">
                    <div class="card widget widget-popular-blog">
                        <div class="card-body">
                            <div class="widget-popular-blog-container">
                                <div class="widget-popular-blog-image">
                                    <img src="{{ asset('assets/images/jenis_pelatihan/' . $pelatihan->bidangPelatihan->gambar) }}" alt="{{ $pelatihan->pelatihan }}">
                                </div>
                                <div class="widget-popular-blog-content ps-4">
                                    <span class="widget-popular-blog-title">
                                        {{ $pelatihan->pelatihan }}
                                    </span>
                                    <span class="widget-popular-blog-title text-black-50">
                                        {{ $pelatihan->bidangPelatihan->bidang_pelatihan }}
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
                            <script>
                                function edit_button_{{ $pelatihan->id }}() {
                                    Swal.fire({
                                    title: "Konfirmasi Pengeditan",
                                    text: "Apakah Anda yakin ingin mengubah data ini? ",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#3085d6",
                                    cancelButtonText: "Batal",
                                    cancelButtonColor: "#d33",
                                    confirmButtonText: "Edit"
                                    }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "/pelatihan/edit/{{ $pelatihan->id }}";
                                    }
                                    });
                                }
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
                            @auth('admin')
                            <a onclick="edit_button_{{ $pelatihan->id }}();" class="btn btn-warning btn-sm float-left"><i class="material-icons-outlined" sty>edit</i></a>
                            <a onclick="hapus_button_{{ $pelatihan->id }}();" class="btn btn-danger btn-sm float-left"><i class="material-icons-outlined">delete</i></a>
                            @endauth
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
@endsection