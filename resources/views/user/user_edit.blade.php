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
                                <form action="/kelola-pengguna/edit/{{ $user->id }}" method="POST">
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
                                        <label for="role_user" class="form-label">Role</label>
                                        <select class="js-states form-control" id="role_user" tabindex="-1" style="display:none;width: 100%" name="role">
                                            <option value="admin" {{ $user->role == "admin" ? 'selected' : '' }}>Admin</option>
                                            <option value="supervisi" {{ $user->role == "supervisi" ? 'selected' : '' }}>Supervisi</option>
                                            <option value="petugas" {{ $user->role == "petugas" ? 'selected' : '' }}>Petugas</option>
                                        </select>
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
<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('#gambar_bidang').change(function() {
        bacaGambar(this);
    });
</script>
@endsection
