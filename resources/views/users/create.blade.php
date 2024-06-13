@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary">
        Tambah Pengguna
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
            @error('nama')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
            {{-- username --}}
            <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
            @error('username')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
            {{-- no_telp --}}
            <div class="mb-3">
            <label for="no_telp" class="form-label">No. Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp') }}">
            @error('no_telp')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            {{--
            <!-- <div class="mb-3"> -->
            <!-- <label for="email" class="form-label">Email</label> -->
            <!-- <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"> -->
            <!-- @error('email') -->
            <!--     <small class="form-text text-danger">{{ $message }}</small> -->
            <!-- @enderror -->
            <!-- </div> -->
            --}}
            <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
            <small class="form-text text-danger">{{ $message }}</small>
            @enderror
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-select" id="role" name="role">
                    <option value disabled selected>Pilih Role</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="ketua_rw" {{ old('role') == 'ketua_rw' ? 'selected' : '' }}>Ketua RW</option>
                    <option value="ketua_rt" {{ old('role') == 'ketua_rt' ? 'selected' : '' }}>Ketua RT</option>
                    <option value="sekretaris_rw" {{ old('role') == 'sekretaris_rw' ? 'selected' : '' }}>Sekretaris RW</option>
                    <option value="sekretaris_rt" {{ old('role') == 'sekretaris_rt' ? 'selected' : '' }}>Sekretaris RT</option>
                    <option value="bendahara_rw" {{ old('role') == 'bendahara_rw' ? 'selected' : '' }}>Bendahara RW</option>
                    <option value="bendahara_rt" {{ old('role') == 'bendahara_rt' ? 'selected' : '' }}>Bendahara RT</option>
                    <option value="warga" {{ old('role') == 'warga' ? 'selected' : '' }}>Warga</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <!-- <a href="{{ route('users.index') }}" class="btn btn-secondary">Batal</a> -->
    </div>
</div>
@endsection
