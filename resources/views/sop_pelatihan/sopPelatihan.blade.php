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
                        <h1>SOP Pelatihan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            {{-- <a class="btn btn-primary btn-sm mb-3" href="/sop-pelatihan/tambah">Tambah SOP Pelatihan</a> --}}
                            <div class="example-container">
                                
                                <div class="example-content">
                                    
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        @php
                                            $nomor = 1;
                                        @endphp
                                        @foreach ($sopKegiatan as $sopK)
                                        @if ($nomor==1)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="pills-{{ $sopK[0]->sop->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $sopK[0]->id }}" type="button" role="tab" aria-controls="pills-{{ $sopK[0]->id }}" aria-selected="true">{{ '#'.$nomor }}</button>
                                            </li>
                                        @else
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="pills-{{ $sopK[0]->sop->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $sopK[0]->id }}" type="button" role="tab" aria-controls="pills-{{ $sopK[0]->id }}" aria-selected="true">{{ '#'.$nomor }}</button>
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
                                            @if ($index_sop==1)
                                                <div class="tab-pane fade show active" id="pills-{{ $sopC[0]->id }}" role="tabpanel" aria-labelledby="pills-{{ $sopC[0]->id }}-tab">
                                            @else
                                                <div class="tab-pane fade" id="pills-{{ $sopC[0]->id }}" role="tabpanel" aria-labelledby="pills-{{ $sopC[0]->id }}-tab">
                                            @endif
                                            <div class="settings-security-two-factor">
                                                <h5><u>Detail</u></h5> 
                                                <p><b>Nomor SOP:</b> {{ $sopC[0]->sop->nomor }}</p>
                                                <p><b>Judul SOP:</b> {{ $sopC[0]->sop->judul}}</p>
                                                
                                            </div>
                                                @php
                                                    $nomor_kegiatan = 1;
                                                @endphp
                                                <div class="example-content">
                                                    <h3>Rincian Kegiatan</h3>
                                                    @foreach ($sopC as $kegiatan)

                                                    @if ($nomor_kegiatan==1)
                                                    <div class="accordion accordion-separated" id="accordionSeparated{{ $kegiatan->id }}">
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header" id="headingSeparated{{ $kegiatan->id }}">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeparated{{ $kegiatan->id }}" aria-expanded="true" aria-controls="collapsSeparated{{ $kegiatan->id }}">
                                                                    {{ $nomor_kegiatan }}. {{ $kegiatan->nama }}
                                                                </button>
                                                            </h2>
                                                            <div id="collapseSeparated{{ $kegiatan->id }}" class="accordion-collapse show" aria-labelledby="headingSeparated{{ $kegiatan->id }}" data-bs-parent="#accordionSeparated{{ $kegiatan->id }}">
                                                                <div class="accordion-body">
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
                                                                    {{ $nomor_kegiatan }}. {{ $kegiatan->nama }}
                                                                </button>
                                                            </h2>
                                                            <div id="collapseSeparated{{ $kegiatan->id }}" class="accordion-collapse collapse" aria-labelledby="headingSeparated{{ $kegiatan->id }}" data-bs-parent="#accordionSeparated{{ $kegiatan->id }}">
                                                                <div class="accordion-body">
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

