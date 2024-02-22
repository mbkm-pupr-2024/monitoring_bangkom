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
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Tambah Jenis Pelatihan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card widget">
                        <div class="card card-body">
                            <div class="widget-stats-container">
                                <form action="/kelola-jenis-pelatihan/tambah" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="nama_jenis" class="form-label">Nama Jenis Pelatihan</label>
                                        <input type="text" class="form-control" id="nama_jenis" name="nama">
                                    </div>
                                    <div class="mb-4">
                                        <button class="btn btn-primary float-end" type="submit">Tambah</button>
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
