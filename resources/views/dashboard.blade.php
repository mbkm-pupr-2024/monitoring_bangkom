@extends('layout.navbar')

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-warning">
                                    <i class="material-icons-outlined">pending</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Sedang Berlangsung</span>
                                    {{-- <span class="widget-stats-amount">{{ $jml_berlangsung }}</span> --}}
                                    {{-- <span class="widget-stats-info">790 unique this month</span> --}}
                                </div>
                                <div class="widget-stats-indicator">
                                    <a href="/pelatihan-berlangsung" type="button" class="btn btn-primary">Lihat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-danger">
                                    <i class="material-icons-outlined">done</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Selesai</span>
                                    {{-- <span class="widget-stats-amount">{{ $jml_selesai }}</span> --}}
                                </div>
                                <div class="widget-stats-indicator">
                                    <a href="/pelatihan-selesai" type="button" class="btn btn-primary">Lihat</a>
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