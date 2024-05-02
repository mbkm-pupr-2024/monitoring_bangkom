@extends('layout.navbar')

@section('style')
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
            {{-- <div class="section-description">
                    <h1>Recent Files</h1>
                </div> --}}

            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="belum-ditinjau-tab" data-bs-toggle="tab" data-bs-target="#belum-ditinjau" type="button" role="tab" aria-controls="belum-ditinjau" aria-selected="false">Belum ditinjau</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="telah-ditinjau-tab" data-bs-toggle="tab" data-bs-target="#telah-ditinjau" type="button" role="tab" aria-controls="telah-ditinjau" aria-selected="false">Telah ditinjau</button>
                </li>
            </ul>
            <br>
            <div class="tab-content">

                <div class="tab-pane fade show active" id="belum-ditinjau" role="tabpanel" aria-labelledby="belum-ditinjau-tab">
                    <div class="row mb-3">
                        <form action="/tinjau-dokumen" method="GET">
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Cari dokumen..." name="dokumen_belum">
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Cari pelatihan..." name="pelatihan_belum">
                                </div>
                                <div class="col-2 my-auto">
                                    <input type="submit" class="btn button btn-info" value="Cari" style="width: 100%">
                                </div>
                            </div>
                        </form>
                    </div>
                    @forelse ($belums as $belum)
                        <div class="card file-manager-recent-item">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    @php
                                        $split = explode('.', $belum->file);
                                        $ext = $split[1]
                                    @endphp
                                    @if ($ext == 'pdf' || $ext == 'doc')
                                        <i class="material-icons-outlined text-danger align-middle m-r-sm">description</i>
                                    @elseif($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg')
                                        <i class="material-icons-outlined text-success align-middle m-r-sm">image</i>
                                    @else
                                        <i class="material-icons-outlined text-primary align-middle m-r-sm">code</i>
                                    @endif
                                    <a href="{{ asset('assets/dokumen/'. $belum->status->pelatihan->id . '_' .$belum->id_kegiatan_tahapan . '.pdf') }}" target="_blank" class="file-manager-recent-item-title flex-fill">{{ $belum->kegiatan_tahapan->dokumen }}</a>
                                    <span class="p-h-sm text-muted">{{ $belum->status->pelatihan->nama }}</span>
                                    <a class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-10" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-10">
                                        <li><a class="dropdown-item" href="/tinjau-dokumen/setujui-{{ $belum->id }}">Setujui</a></li>
                                        
                                        <script>
                                            async function tolak_button_{{ $belum->id }}() {
                                                const { value: text } = await Swal.fire({
                                                    input: "textarea",
                                                    inputLabel: "Pesan Anda",
                                                    inputPlaceholder: "Masukkan pesan Anda...",
                                                    inputAttributes: {
                                                        "aria-label": "Masukkan pesan Anda"
                                                    },
                                                    showCancelButton: true,
                                                    confirmButtonText: 'Kirim',
                                                    cancelButtonText: 'Batal' 
                                                    });
                                                    if (text) {
                                                    window.location.href = '/tinjau-dokumen/tolak-{{ $belum->id }}?pesan=' + encodeURIComponent(text);
                                                }
                                            }
                                        </script>
                                        <li><a class="dropdown-item" onclick=" return tolak_button_{{ $belum->id }}();">Tolak</a></li>

                                        {{-- <li><a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#tolakDokumenModal">Tolak</a></li> --}}

                                        {{-- <div class="modal fade" id="tolakDokumenModal" aria-labelledby="tolakModal" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tolakModal">Kirim Penolakan</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Placeholder text for this demonstration of a vertically centered modal dialog.</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}


                                        <li><a class="dropdown-item" href="/tinjau-dokumen/unduh-{{ $belum->id }}">Unduh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card file-manager-recent-item">
                            <div class="card-body">
                                <h6 class="text-muted">Tidak ada dokumen yang belum ditinjau</h6>
                            </div>
                        </div>
                    @endforelse
                </div>
                <div class="tab-pane fade" id="telah-ditinjau" role="tabpanel" aria-labelledby="telah-ditinjau-tab">
                    <div class="row mb-3">
                        <form action="/tinjau-dokumen" method="GET">
                            <div class="row">
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Cari dokumen..." name="dokumen_telah">
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Cari pelatihan..." name="pelatihan_telah">
                                </div>
                                <div class="col-2 my-auto">
                                    <input type="submit" class="btn button btn-info" value="Cari" style="width: 100%">
                                </div>
                            </div>
                        </form>
                    </div>
                    @forelse($telahs as $telah)
                        <div class="card file-manager-recent-item">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    @php
                                        $split = explode('.', $telah->file);
                                        $ext = $split[1]
                                    @endphp
                                    @if ($ext == 'pdf' || $ext == 'doc')
                                        <i class="material-icons-outlined text-danger align-middle m-r-sm">description</i>
                                    @elseif($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg')
                                        <i class="material-icons-outlined text-success align-middle m-r-sm">image</i>
                                    @else
                                        <i class="material-icons-outlined text-primary align-middle m-r-sm">code</i>
                                    @endif
                                    <a href="#" class="file-manager-recent-item-title flex-fill">{{ $telah->kegiatan_tahapan->dokumen }}</a>
                                    <span class="p-h-sm text-muted">{{ $telah->status->pelatihan->nama }}</span>
                                    <span class="p-h-sm text-muted"><span class="badge badge-{{ $telah->keterangan == 'Disetujui' ? 'success' : 'danger' }}">{{ $telah->keterangan }}</span></span>
                                    <a class="dropdown-toggle file-manager-recent-file-actions" id="file-manager-recent-10" data-bs-toggle="dropdown" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="file-manager-recent-10">
                                        <li><a class="dropdown-item" href="/tinjau-dokumen/unduh-{{ $telah->id }}">Unduh</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card file-manager-recent-item">
                            <div class="card-body">
                                <h6 class="text-muted">Tidak ada dokumen yang telah ditinjau</h6>
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
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/select2.js') }}"></script>
@endsection

