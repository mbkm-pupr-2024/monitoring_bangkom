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
                                <a href="/bidang-pelatihan/tambah" class="btn btn-primary btn-sm float-end mb-5"><i class="material-icons-outlined">add</i> Tambah Jadwal Pelatihan</a>
                            </div>
                        <div class="row">
                        <table id="datatable1" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Bidang Pelatihan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bidangs as $bidang)
                                <tr>
                                    <td>{{ $bidang->id }}</td>
                                    <td>{{ $bidang->bidang_pelatihan }}</td>
                                    <td>
                                        <script>
                                            function edit_button_{{ $bidang->id }}() {
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
                                                    window.location.href = "/bidang-pelatihan/edit/{{ $bidang->id }}";
                                                }
                                                });
                                            }
                                            function hapus_button_{{ $bidang->id }}() {
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
                                                    window.location.href = "/bidang-pelatihan/hapus/{{ $bidang->id }}";
                                                }
                                                });
                                            }
                                        </script>
                                        <a onclick="edit_button_{{ $bidang->id }}();" class="btn btn-warning btn-sm"><i class="material-icons-outlined center" sty>edit</i></a> 
                                        <a onclick="hapus_button_{{ $bidang->id }}();" class="btn btn-danger btn-sm"><i class="material-icons-outlined center" sty>delete</i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Id</th>
                                    <th>Bidang Pelatihan</th>
                                </tr>
                            </tfoot>
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

