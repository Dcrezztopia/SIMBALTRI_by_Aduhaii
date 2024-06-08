@extends('layout.app')

@section('content_body')
<div class="card shadow-sm">
    <div class="card-header lin-gradient-light-primary text-dark d-flex justify-content-between align-items-center">
        <h4 class="m-0">Detail Pelaporan</h4>
        <a href="{{ route('pelaporan.riwayat') }}" class="btn btn-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h5 class="text-primary"><i class="bi bi-person-fill"></i> Nama:</h5>
                <p>{{ $pelaporan->nama }}</p>
                <h5 class="text-primary"><i class="bi bi-calendar-fill"></i> Tanggal Lahir:</h5>
                <p>{{ $pelaporan->tanggal_lahir }}</p>
                <h5 class="text-primary"><i class="bi bi-gender-{{ $pelaporan->jenis_kelamin == 'L' ? 'male' : 'female' }}"></i> Jenis Kelamin:</h5>
                <p>{{ $pelaporan->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan' }}</p>
                <h5 class="text-primary"><i class="bi bi-flag-fill"></i> Kewarganegaraan:</h5>
                <p>{{ $pelaporan->kewarganegaraan }}</p>
            </div>
            <div class="col-md-6">
                <h5 class="text-primary"><i class="bi bi-house-door-fill"></i> Alamat Rumah:</h5>
                <p>{{ $pelaporan->alamat_rumah }}</p>
                <h5 class="text-primary"><i class="bi bi-exclamation-circle-fill"></i> Perihal:</h5>
                <p>{{ $pelaporan->perihal }}</p>
                <h5 class="text-primary"><i class="bi bi-file-text-fill"></i> Isi:</h5>
                <p>{{ $pelaporan->isi }}</p>
                <h5 class="text-primary"><i class="bi bi-clock-fill"></i> Tanggal Dibuat:</h5>
                <p>{{ $pelaporan->tanggal_dibuat }}</p>
            </div>
        </div>
        @if($pelaporan->foto_bukti)
        <div class="row mt-4">
            <div class="col-md-12">
                <h5 class="text-primary"><i class="bi bi-image-fill"></i> Foto Bukti:</h5>
                <img src="{{ asset('storage/foto_bukti/' . $pelaporan->foto_bukti) }}" alt="Foto Bukti" class="img-fluid rounded" style="max-width: 100%;">
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
