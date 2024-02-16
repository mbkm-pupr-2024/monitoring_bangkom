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
                        <h1>Edit Bidang Pelatihan</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card widget">
                        <div class="card card-body">
                            <div class="widget-stats-container">
                                <form action="/bidang-pelatihan/edit/{{ $bidang->id }}" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="nama_bidang" class="form-label">Nama Bidang Pelatihan</label>
                                        <input type="text" class="form-control" id="nama_bidang" name="bidang_pelatihan" value="{{ $bidang->bidang_pelatihan }}">
                                    </div>
                                    <div class="mb-4">
                                        <button class="btn btn-primary float-end" type="submit">Edit</button>
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
