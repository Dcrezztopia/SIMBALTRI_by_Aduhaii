@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-dark">
        Edit Pelaporan
    </div>
    <div class="card-body">
        <form action="{{ route('pelaporan.update', $pelaporan->id_pelaporan) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $pelaporan->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $pelaporan->tanggal_lahir }}" required>
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                    <option value="L" {{ $pelaporan->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ $pelaporan->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="{{ $pelaporan->kewarganegaraan }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat_rumah" class="form-label">Alamat Rumah</label>
                <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" value="{{ $pelaporan->alamat_rumah }}" required>
            </div>
            <div class="mb-3">
                <label for="perihal" class="form-label">Perihal</label>
                <input type="text" class="form-control" id="perihal" name="perihal" value="{{ $pelaporan->perihal }}" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Isi</label>
                <textarea class="form-control" id="isi" name="isi" required>{{ $pelaporan->isi }}</textarea>
            </div>
            <div class="mb-3">
                <label for="foto_bukti" class="form-label">Foto Bukti</label>
                <input type="file" class="form-control" id="foto_bukti" name="foto_bukti">
                @if($pelaporan->foto_bukti)
                <img src="{{ asset('storage/' . $pelaporan->foto_bukti) }}" class="img-fluid" alt="Foto Bukti">
                @endif

            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('pelaporan.riwayat') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection