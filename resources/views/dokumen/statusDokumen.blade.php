@extends('layout.navbar')

@section('style')

@endsection

@section('sidebar')
@include('layout.sidebar')
@endsection

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            {{-- <div class="section-description">
                    <h1>Recent Files</h1>
                </div> --}}

            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="terkirim-tab" data-bs-toggle="tab" data-bs-target="#terkirim-dokumen" type="button" role="tab" aria-controls="terkirim-dokumen" aria-selected="false">Terkirim</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="disetujui-tab" data-bs-toggle="tab" data-bs-target="#disetujui-dokumen" type="button" role="tab" aria-controls="disetujui-dokumen" aria-selected="false">Disetujui</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="ditolak-tab" data-bs-toggle="tab" data-bs-target="#ditolak-dokumen" type="button" role="tab" aria-controls="ditolak-dokumen" aria-selected="false">Ditolak</button>
                </li>
            </ul>
            <br>
            <div class="tab-content">
                
                <div class="tab-pane fade show active" id="terkirim-dokumen" role="tabpanel" aria-labelledby="terkirim-tab">
                    <div class="row mb-3">
                        <form action="/riwayat-dokumen" method="GET">
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Cari dokumen..." name="dokumen_terkirim">
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Cari pelatihan..." name="pelatihan_terkirim">
                                </div>
                                <div class="col-2 my-auto">
                                    <input type="submit" class="btn button btn-info" value="Cari" style="width: 100%">
                                </div>
                            </div>
                        </form>
                    </div>
                    @forelse ($terkirims as $terkirim)
                        <div class="card file-manager-recent-item">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    @php
                                        $split = explode('.', $terkirim->file);
                                        $ext = $split[1]
                                    @endphp
                                    @if ($ext == 'pdf' || $ext == 'doc')
                                        <i class="material-icons-outlined text-danger align-middle m-r-sm">description</i>
                                    @elseif($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg')
                                        <i class="material-icons-outlined text-success align-middle m-r-sm">image</i>
                                    @else
                                        <i class="material-icons-outlined text-primary align-middle m-r-sm">code</i>
                                    @endif
                                    {{-- <a href="{{ asset('assets/dokumen/daftar_calon_peserta.xlsx') }}" target="_blank" class="file-manager-recent-item-title flex-fill">{{ $terkirim->kegiatan_tahapan->dokumen }}</a> --}}
                                    <a href="{{ asset('assets/dokumen/'. $terkirim->status->pelatihan->id . '_' .$terkirim->id_kegiatan_tahapan . '.pdf') }}" target="_blank" class="file-manager-recent-item-title flex-fill">{{ $terkirim->kegiatan_tahapan->dokumen }}</a>
                                    <span class="p-h-sm text-muted">{{ $terkirim->status->pelatihan->nama }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card file-manager-recent-item">
                            <div class="card-body">
                                <h6 class="text-muted">Tidak ada dokumen terkirim</h6>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="tab-pane fade" id="disetujui-dokumen" role="tabpanel" aria-labelledby="disetujui-tab">
                    <div class="row mb-3">
                        <form action="/riwayat-dokumen" method="GET">
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Cari dokumen..." name="dokumen_disetujui">
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Cari pelatihan..." name="pelatihan_disetujui">
                                </div>
                                <div class="col-2 my-auto">
                                    <input type="submit" class="btn button btn-info" value="Cari" style="width: 100%">
                                </div>
                            </div>
                        </form>
                    </div>
                    @forelse($disetujuis as $disetujui)
                        <div class="card file-manager-recent-item">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    @php
                                        $split = explode('.', $disetujui->file);
                                        $ext = $split[1]
                                    @endphp
                                    @if ($ext == 'pdf' || $ext == 'doc')
                                        <i class="material-icons-outlined text-danger align-middle m-r-sm">description</i>
                                    @elseif($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg')
                                        <i class="material-icons-outlined text-success align-middle m-r-sm">image</i>
                                    @else
                                        <i class="material-icons-outlined text-primary align-middle m-r-sm">code</i>
                                    @endif
                                    <a href="#" class="file-manager-recent-item-title flex-fill">{{ $disetujui->kegiatan_tahapan->dokumen }}</a>
                                    <span class="p-h-sm text-muted">{{ $disetujui->status->pelatihan->nama }}</span>
                                    <a class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-10" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-10">
                                        <li><a class="dropdown-item" href="#">Download</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card file-manager-recent-item">
                            <div class="card-body">
                                <h6 class="text-muted">Tidak ada dokumen disetujui</h6>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="tab-pane fade" id="ditolak-dokumen" role="tabpanel" aria-labelledby="ditolak-tab">
                    <div class="row mb-3">
                        <form action="/riwayat-dokumen" method="GET">
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Cari dokumen..." name="dokumen_ditolak">
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Cari pelatihan..." name="pelatihan_ditolak">
                                </div>
                                <div class="col-2 my-auto">
                                    <input type="submit" class="btn button btn-info" value="Cari" style="width: 100%">
                                </div>
                            </div>
                        </form>
                    </div>
                    @forelse ($ditolaks as $ditolak)
                        <div class="card file-manager-recent-item">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    @php
                                        $split = explode('.', $ditolak->kegiatan_tahapan->file);
                                        $ext = count($split) > 1 ? $split[1] : ''; // Periksa jika ekstensi ada sebelum mengakses indeks
                                    @endphp
                                    @if ($ext == 'pdf' || $ext == 'doc')
                                        <i class="material-icons-outlined text-danger align-middle m-r-sm">description</i>
                                    @elseif($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg')
                                        <i class="material-icons-outlined text-success align-middle m-r-sm">image</i>
                                    @else
                                        <i class="material-icons-outlined text-primary align-middle m-r-sm">code</i>
                                    @endif
                                    <a href="#" class="file-manager-recent-item-title flex-fill">{{ $ditolak->kegiatan_tahapan->dokumen }}</a>
                                    <span class="p-h-sm text-muted">{{ $ditolak->status->pelatihan->nama }}</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card file-manager-recent-item">
                            <div class="card-body">
                                <h6 class="text-muted">Tidak ada dokumen ditolak</h6>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

                    {{-- <table id="datatable1" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pelatihan</th>
                                <th>Dokumen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($dokumens as $dokumen)
                            <tr>
                                <td>{{ $no }}</td>
                                <td>
                                    <img src="{{ asset('assets/images/bidang_pelatihan/' . $dokumen->bidang_pelatihan->gambar) }}" width="35" > 
                                    {{ $dokumen->nama }}
                                </td>
                                <td>
                                    <script>
                                        function cetak_button_{{ $dokumen->id }}() {
                                            Swal.fire({
                                            title: "Konfirmasi Pencetakan Surat",
                                            text: "Apakah Anda ingin melakukan cetak surat untuk pelatihan ini? ",
                                            icon: "warning",
                                            showCancelButton: true,
                                            confirmButtonColor: "#3085d6",
                                            cancelButtonText: "Batal",
                                            cancelButtonColor: "#d33",
                                            confirmButtonText: "Menuju Cetak Menu"
                                            }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = "/cetak-surat/pelatihan-{{ $dokumen->id }}";
                                            }
                                            });
                                        }
                                    </script>
                                    <a onclick="cetak_button_{{ $dokumen->id }}();" class="btn btn-primary btn-sm"><i class="material-icons-outlined center" sty>print</i></a> 
                                </td>
                            </tr>
                            @php
                                $no++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table> --}}
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection

