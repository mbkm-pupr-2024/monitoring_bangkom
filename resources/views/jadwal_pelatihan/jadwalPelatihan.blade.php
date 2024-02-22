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
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Jadwal Pelatihan</h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="/jadwal-pelatihan/tambah" class="btn btn-primary btn-sm float-end mb-5"><i class="material-icons-outlined">add</i> Tambah Jadwal Pelatihan</a>
                            </div>
                        <div class="row">
                        <table id="datatable1" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Jenis Pelatihan</th>
                                    <th>Bidang Pelatihan</th>
                                    <th>Model Pelatihan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwals as $jadwal)
                                @php
                                    $no = 1;
                                @endphp
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $jadwal->nama }}</td>
                                    <td>{{ $jadwal->jenis_pelatihan->nama }}</td>
                                    <td>{{ $jadwal->bidang_pelatihan->nama }}</td>
                                    <td>{{ $jadwal->model_pelatihan->nama }}</td>
                                    <td>{{ $jadwal->tanggal_mulai }}</td>
                                    <td>{{ $jadwal->tanggal_selesai }}</td>
                                    <td>
                                        <script>
                                            function mulai_button_{{ $jadwal->id }}() {
                                                Swal.fire({
                                                title: "Konfirmasi Pelaksanaan",
                                                text: "Apakah Anda yakin ingin memulai pelatihan ini? ",
                                                icon: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#3085d6",
                                                cancelButtonText: "Batal",
                                                cancelButtonColor: "#d33",
                                                confirmButtonText: "Mulai"
                                                }).then((result) => {
                                                if (result.isConfirmed) {
                                                    window.location.href = "/jadwal-pelatihan/mulai/{{ $jadwal->id }}";
                                                }
                                                });
                                            }
                                            function edit_button_{{ $jadwal->id }}() {
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
                                                    window.location.href = "/jadwal-pelatihan/edit/{{ $jadwal->id }}";
                                                }
                                                });
                                            }
                                            function hapus_button_{{ $jadwal->id }}() {
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
                                                    window.location.href = "/jadwal-pelatihan/hapus/{{ $jadwal->id }}";
                                                }
                                                });
                                            }
                                        </script>
                                        <a onclick="mulai_button_{{ $jadwal->id }}();" class="btn btn-primary btn-sm"><i class="material-icons-outlined center" sty>add_box</i></a> 
                                        <a onclick="edit_button_{{ $jadwal->id }}();" class="btn btn-warning btn-sm"><i class="material-icons-outlined center" sty>edit</i></a> 
                                        <a onclick="hapus_button_{{ $jadwal->id }}();" class="btn btn-danger btn-sm"><i class="material-icons-outlined center" sty>delete</i></a>
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                                @endforeach
                            </tbody>
                            {{-- <tfoot>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelatihan</th>
                                    <th>Jenis Pelatihan</th>
                                    <th>Bidang Pelatihan</th>
                                    <th>Model Pelatihan</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                </tr>
                            </tfoot> --}}
                        </table>
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

