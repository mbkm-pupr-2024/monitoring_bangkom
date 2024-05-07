@extends('layout.navbar')

@section('style')
@endsection

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Edit Pengguna</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <div class="card widget">
                        <div class="card card-body">
                            <div class="widget-stats-container">
                                <form action="/edit-profile" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="nip_user" class="form-label">NIP</label>
                                        <input type="text" class="form-control" id="nip_user" name="nip" value="{{ $user->nip }}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="nama_lengkap_user" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap_user" name="nama_lengkap" value="{{ $user->nama_lengkap }}">
                                    </div>
                                    <div class="mb-4">
                                        <label for="username_user" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username_user" name="username" value="{{ $user->username }}">
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
