@extends('layout.navbar')

@section('style')
<link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Tambah Pengguna</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card widget">
                        <div class="card card-body">
                            <div class="widget-stats-container">
                                <form action="/kelola-pengguna/tambah" method="POST">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="nip_user" class="form-label">NIP</label>
                                        <input type="text" class="form-control" id="nip_user" name="nip">
                                    </div>
                                    <div class="mb-4">
                                        <label for="nama_lengkap_user" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="nama_lengkap_user" name="nama_lengkap">
                                    </div>
                                    <div class="mb-4">
                                        <label for="role_user" class="form-label">Role</label>
                                        <select class="js-states form-control" id="role_user" tabindex="-1" style="display:none;width: 100%" name="role">
                                            <option value="admin">Admin</option>
                                            <option value="supervisi">Supervisi</option>
                                            <option value="petugas">Petugas</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="password_user" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password_user" name="password">
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
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/select2.js') }}"></script>
@endsection
