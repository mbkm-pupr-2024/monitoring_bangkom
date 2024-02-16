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
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Data SOP Pelatihan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-primary btn-sm mb-3" href="/sop-pelatihan/tambah">Tambah SOP Pelatihan</a>
                            <div class="example-container">
                                
                                <div class="example-content">
                                    
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        @php
                                            $nomor = 1;
                                        @endphp
                                        @foreach ($sopKegiatan as $sop)
                                        @if ($nomor==1)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-{{ $sop[0]->sop_pelatihan->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $sop[0]->id }}" type="button" role="tab" aria-controls="pills-{{ $sop[0]->id }}" aria-selected="true">{{ '#'.$nomor }}</button>
                                            </li>
                                        @else
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-{{ $sop[0]->sop_pelatihan->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $sop[0]->id }}" type="button" role="tab" aria-controls="pills-{{ $sop[0]->id }}" aria-selected="true">{{ '#'.$nomor }}</button>
                                            </li>
                                        @endif
                                        @php
                                            $nomor++
                                        @endphp
                                        @endforeach
                                    </ul>

                                    @php
                                        $index_sop = 1;
                                    @endphp
                                    <div class="tab-content" id="pills-tabContent">
                                        @foreach ($sopKegiatan as $sopC)
                                        <script>
                                            function sop_edit_button_{{ $index_sop }}() {
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
                                                    window.location.href = "/sop-pelatihan/edit/{{ $sopC[0]->sop_pelatihan->id }}";
                                                }
                                                });
                                            }
                                            function sop_hapus_button_{{ $index_sop }}() {
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
                                                    window.location.href = "/sop-pelatihan/hapus/{{ $sopC[0]->sop_pelatihan->id }}";
                                                }
                                                });
                                            }
                                        </script>
                                            @if ($index_sop==1)
                                                <div class="tab-pane fade show active" id="pills-{{ $sopC[0]->id }}" role="tabpanel" aria-labelledby="pills-{{ $sopC[0]->id }}-tab">
                                            @else
                                                <div class="tab-pane fade" id="pills-{{ $sopC[0]->id }}" role="tabpanel" aria-labelledby="pills-{{ $sopC[0]->id }}-tab">
                                            @endif
                                            <div class="settings-security-two-factor">
                                                <a class="nav-link dropdown-toggle btn btn-primary btn-sm float-end" type="button" href="#" id="addDropdownLink" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="material-icons">more_horiz</i>
                                                </a>
                                                <ul class="dropdown-menu" aria-labelledby="addDropdownLink">
                                                    
                                                    <li><a class="dropdown-item" style="cursor: pointer;" onclick="sop_edit_button_{{ $index_sop }}();">Edit SOP Pelatihan</a></li>
                                                    <li><a class="dropdown-item" style="cursor: pointer;" onclick="sop_hapus_button_{{ $index_sop }}();">Hapus SOP Pelatihan</a></li>
                                                    <li><a class="dropdown-item" style="cursor: pointer;" href="/kegiatan-pelatihan/tambah/{{ $sopC[0]->sop_pelatihan->id }}">Tambah Kegiatan</a></li>
                                                </ul>
                                                <h5><u>Detail</u></h5> 
                                                <p><b>Nomor SOP:</b> {{ $sopC[0]->sop_pelatihan->id }}</p>
                                                <p><b>Judul SOP:</b> {{ $sopC[0]->sop_pelatihan->sop}}</p>
                                                
                                            </div>
                                                @php
                                                    $nomor_kegiatan = 1;
                                                @endphp
                                                <div class="example-content">
                                                    <h3>Rincian Kegiatan</h3>
                                                    @foreach ($sopC as $kegiatan)

                                                    <script>
                                                        function kegiatan_edit_button_{{ $kegiatan->id }}() {
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
                                                                window.location.href = "kegiatan-pelatihan/edit/{{ $kegiatan->id }}";
                                                            }
                                                            });
                                                        }
                                                        function kegiatan_hapus_button_{{ $kegiatan->id }}() {
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
                                                                window.location.href = "kegiatan-pelatihan/hapus/{{ $kegiatan->id }}";
                                                            }
                                                            });
                                                        }
                                                    </script>

                                                    @if ($nomor_kegiatan==1)
                                                    <div class="accordion accordion-separated" id="accordionSeparated{{ $kegiatan->id }}">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingSeparated{{ $kegiatan->id }}">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeparated{{ $kegiatan->id }}" aria-expanded="true" aria-controls="collapsSeparated{{ $kegiatan->id }}">
                                                                    {{ $nomor_kegiatan }}. {{ $kegiatan->kegiatan }}
                                                                </button>
                                                            </h2>
                                                            <div id="collapseSeparated{{ $kegiatan->id }}" class="accordion-collapse show" aria-labelledby="headingSeparated{{ $kegiatan->id }}" data-bs-parent="#accordionSeparated{{ $kegiatan->id }}">
                                                                <div class="accordion-body">
                                                                    <a onclick="kegiatan_hapus_button_{{ $kegiatan->id }}();" type="button" class="btn btn-danger btn-sm float-end"><i class="material-icons">delete</i></a> 
                                                                    <a onclick="kegiatan_edit_button_{{ $kegiatan->id }}();" type="button" class="btn btn-warning btn-sm float-end"><i class="material-icons">edit</i></a>
                                                                    {{ $kegiatan->deskripsi }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @else
                                                    <div class="accordion accordion-separated" id="accordionSeparated{{ $kegiatan->id }}">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingSeparated{{ $kegiatan->id }}">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeparated{{ $kegiatan->id }}" aria-expanded="false" aria-controls="collapsSeparated{{ $kegiatan->id }}">
                                                                    {{ $nomor_kegiatan }}. {{ $kegiatan->kegiatan }}
                                                                </button>
                                                            </h2>
                                                            <div id="collapseSeparated{{ $kegiatan->id }}" class="accordion-collapse collapse" aria-labelledby="headingSeparated{{ $kegiatan->id }}" data-bs-parent="#accordionSeparated{{ $kegiatan->id }}">
                                                                <div class="accordion-body">
                                                                    <a onclick="kegiatan_hapus_button_{{ $kegiatan->id }}();" type="button" class="btn btn-danger btn-sm float-end"><i class="material-icons">delete</i></a> 
                                                                    <a onclick="kegiatan_edit_button_{{ $kegiatan->id }}();" type="button" class="btn btn-warning btn-sm float-end"><i class="material-icons">edit</i></a>
                                                                    {{ $kegiatan->deskripsi }}
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif
                                                    @php
                                                        $nomor_kegiatan++;
                                                    @endphp
                                                    @endforeach
                                                </div>
                                                </div>
                                            @php
                                                $index_sop++;
                                            @endphp
                                        @endforeach
                                    </div>
                                </div>
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

