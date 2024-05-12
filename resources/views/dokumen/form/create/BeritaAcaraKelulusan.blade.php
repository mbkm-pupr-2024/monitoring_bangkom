@extends('layout.navbar')

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1 class="mb-2">{{ $kegiatan->dokumen }}</h1>
                        <h5 class="text-muted">Pelatihan {{ $pelatihan->nama }}</h5>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card widget">
                        <div class="card card-body">
                            <div class="widget-stats-container">
                                <form action="{{ route('create-'. $nama_fungsi, ['id_pl' => $pelatihan->id, 'id_kthp' => $kegiatan->id]) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                                        <input type="text" class="form-control" id="nomor_surat" name="nomor_surat">
                                    </div> 
                                    <h6>Berdasarkan hasil rapat evaluasi kelulusan:</h6>
                                    <div class="mb-4">
                                        <label for="jumlah_peserta" class="form-label">Jumlah Peserta</label>
                                        <input type="text" class="form-control" id="jumlah_peserta" name="jumlah_peserta">
                                    </div> 
                                    <h6>Peserta lulus dengan predikat:</h6>
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="memuaskan" class="form-label">Memuaskan</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="memuaskan" name="memuaskan" aria-describedby="basic-addon2">
                                                <span class="input-group-text" id="basic-addon2">orang</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="baik_sekali" class="form-label">Baik Sekali</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="baik_sekali" name="baik_sekali" aria-describedby="basic-addon2">
                                                <span class="input-group-text" id="basic-addon2">orang</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="baik" class="form-label">Baik</label>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" id="baik" name="baik" aria-describedby="basic-addon2">
                                                <span class="input-group-text" id="basic-addon2">orang</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="mb-4">
                                        <label for="req_BA" class="form-label">Upload Requirement</label>
                                        <input type="file" class="form-control" id="req_BA" name="req_BA" accept=".xls, .xlsx">
                                    </div>
                                    <p>Download requirement berikut untuk mengisi requirement diatas: 
                                        <a href="{{ route('download-requirement', ['file' => 'req_beritaAcaraKelulusan']) }}">Unduh requirement</a>
                                    </p>
                                    <br>
                                    <div class="mb-4">
                                        <button class="btn btn-success float-end" type="submit">Cetak surat</button>
                                    </div>
                                </form>
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
@endsection
