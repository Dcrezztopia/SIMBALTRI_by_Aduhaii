@extends('layout.app')

@section('content_body')
<div class="container">
    <h2>Edit Data Warga</h2>
    <form action="{{ route('datawarga.update', $datawarga->nik) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="no_kk" class="form-label">No. Kartu Keluarga</label>
            <input type="text" class="form-control" id="no_kk" name="no_kk" value="{{ $datawarga->no_kk }}">
            @error('no_kk')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ $datawarga->nama }}">
            @error('nama')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat_rumah" class="form-label">Alamat Rumah</label>
            <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah"
                value="{{ $datawarga->alamat_rumah }}">
            @error('alamat_rumah')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="RT" class="form-label">RT</label>
            <input type="text" class="form-control" id="RT" name="RT"
                value="{{ $datawarga->RT }}">
            @error('RT')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                value="{{ $datawarga->jenis_kelamin }}">
            @error('jenis_kelamin')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="agama" class="form-label">Agama</label>
            <input type="text" class="form-control" id="agama" name="agama"
                value="{{ $datawarga->agama }}">
            @error('agama')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                value="{{ $datawarga->tanggal_lahir }}">
            @error('tanggal_lahir')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                value="{{ $datawarga->tempat_lahir }}">
            @error('tempat_lahir')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pendidikan" class="form-label">Pendidikan</label>
            <select class="form-control" id="pendidikan" name="pendidikan">
                <option value="TIDAK/BELUM SEKOLAH" {{ $datawarga->pendidikan == 'TIDAK/BELUM SEKOLAH' ? 'selected' : '' }}>
                    TIDAK/BELUM SEKOLAH</option>
                <option value="BELUM TAMAT SD" {{ $datawarga->pendidikan == 'BELUM TAMAT SD' ? 'selected' : '' }}>BELUM TAMAT SD
                </option>
                <option value="TAMAT SD" {{ $datawarga->pendidikan == 'TAMAT SD' ? 'selected' : '' }}>
                    TAMAT SD</option>
                <option value="SLTP/SEDERAJAT" {{ $datawarga->pendidikan == 'SLTP/SEDERAJAT' ? 'selected' : '' }}>
                    SLTP/SEDERAJAT</option>
                <option value="SLTA/SEDERAJAT" {{ $datawarga->pendidikan == 'SLTA/SEDERAJAT' ? 'selected' : '' }}>
                    SLTA/SEDERAJAT</option>
                <option value="DIPLOMA I/II" {{ $datawarga->pendidikan == 'DIPLOMA I/II' ? 'selected' : '' }}>
                    DIPLOMA I/II</option>
                <option value="DIPLOMA III" {{ $datawarga->pendidikan == 'DIPLOMA III' ? 'selected' : '' }}>
                    DIPLOMA III</option>
                <option value="DIPLOMA IV/STRATA I" {{ $datawarga->pendidikan == 'DIPLOMA IV/STRATA I' ? 'selected' : '' }}>
                    DIPLOMA IV/STRATA I</option>
                <option value="STRATA II" {{ $datawarga->pendidikan == 'STRATA II' ? 'selected' : '' }}>
                    STRATA II</option>
                <option value="STRATA III" {{ $datawarga->pendidikan == 'STRATA III' ? 'selected' : '' }}>
                    STRATA III</option>

            </select>
            @error('pendidikan')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pekerjaan" class="form-label">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $datawarga->pekerjaan }}">
            @error('pekerjaan')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status_pernikahan" class="form-label">Status Pernikahan</label>
            <select class="form-control" id="status_pernikahan" name="status_pernikahan">
                <option value="BELUM/TIDAK MENIKAH" {{ $datawarga->status_pernikahan == 'BELUM/TIDAK MENIKAH' ? 'selected' : '' }}>
                    BELUM/TIDAK MENIKAH</option>
                <option value="MENIKAH" {{ $datawarga->status_pernikahan == 'MENIKAH' ? 'selected' : '' }}>
                    MENIKAH</option>
                <option value="DUDA/JANDA" {{ $datawarga->status_pernikahan == 'DUDA/JANDA' ? 'selected' : '' }}>
                    DUDA/JANDA</option>
            </select>
            @error('status_pernikahan')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status_penduduk" class="form-label">Status Penduduk</label>
            <select class="radio" id="status_penduduk" name="status_penduduk">
                <option value="T" {{ $datawarga->status_penduduk == 'T' ? 'selected' : '' }}>
                    T</option>
                <option value="P" {{ $datawarga->status_penduduk == 'P' ? 'selected' : '' }}>
                    P</option>
                <option value="A" {{ $datawarga->status_penduduk == 'A' ? 'selected' : '' }}>
                    A</option>
            </select>
            @error('status_penduduk')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
