@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-dark">
        Detail Pelaporan
    </div>
    <div class="card-body">
        <h5>Nama: {{ $pelaporan->nama }}</h5>
        <p>Tanggal Lahir: {{ $pelaporan->tanggal_lahir }}</p>
        <p>Jenis Kelamin: {{ $pelaporan->jenis_kelamin }}</p>
        <p>Kewarganegaraan: {{ $pelaporan->kewarganegaraan }}</p>
        <p>Alamat Rumah: {{ $pelaporan->alamat_rumah }}</p>
        <p>Perihal: {{ $pelaporan->perihal }}</p>
        <p>Isi: {{ $pelaporan->isi }}</p>
        <p>Tanggal Dibuat: {{ $pelaporan->tanggal_dibuat }}</p>
        @if($pelaporan->foto_bukti)
        <p>Foto Bukti:</p>
        <img src="{{ Storage::url('foto_bukti') . $pelaporan->foto_bukti }}" alt="Foto Bukti" class="img-fluid">
        @endif
    </div>
</div>
<div class="form-group">
    <a href="{{ route('pelaporan.riwayat') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection