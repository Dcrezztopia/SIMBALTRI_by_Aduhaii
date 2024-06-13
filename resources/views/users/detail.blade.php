@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary">
        Detail Pengguna
    </div>
    <div class="card-body">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $userToShow->nama }}" readonly>
        </div>
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ $userToShow->username }}" readonly>
        </div>
        <!-- <div class="mb-3"> -->
        <!--     <label for="RT" class="form-label">RT</label> -->
        <!--     <input type="text" class="form-control" id="RT" name="RT" value="{{ $userToShow->RT }}" readonly> -->
        <!-- </div> -->
        <!-- <div class="mb-3"> -->
        <!--     <label for="email" class="form-label">Email</label> -->
        <!--     <input type="email" class="form-control" id="email" name="email" value="{{ $userToShow->email }}" readonly> -->
        <!-- </div> -->
        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="text" class="form-control" id="role" name="role" value="{{ $userToShow->role }}" readonly>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Kembali</a>

    </div>
</div>
@endsection
