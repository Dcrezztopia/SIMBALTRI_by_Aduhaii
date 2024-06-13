@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Detail Pelaporan</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="detail-item">
                    <h5 class="detail-title">Nama:</h5>
                    <p>{{ $pelaporan->nama }}</p>
                </div>
                <div class="detail-item">
                    <h5 class="detail-title">Tanggal Lahir:</h5>
                    <p>{{ $pelaporan->tanggal_lahir }}</p>
                </div>
                <div class="detail-item">
                    <h5 class="detail-title">Jenis Kelamin:</h5>
                    <p>{{ $pelaporan->jenis_kelamin }}</p>
                </div>
                <div class="detail-item">
                    <h5 class="detail-title">Kewarganegaraan:</h5>
                    <p>{{ $pelaporan->kewarganegaraan }}</p>
                </div>
                <div class="detail-item">
                    <h5 class="detail-title">Alamat Rumah:</h5>
                    <p>{{ $pelaporan->alamat_rumah }}</p>
                </div>
                <div class="detail-item">
                    <h5 class="detail-title">Perihal:</h5>
                    <p>{{ $pelaporan->perihal }}</p>
                </div>
                <div class="detail-item">
                    <h5 class="detail-title">Isi:</h5>
                    <p>{{ $pelaporan->isi }}</p>
                </div>
                <div class="detail-item">
                    <h5 class="detail-title">Tanggal Dibuat:</h5>
                    <p>{{ $pelaporan->tanggal_dibuat }}</p>
                </div>
            </div>
            <div class="col-md-6">
                @if($pelaporan->foto_bukti)
                <div class="detail-item text-center">
                    <h5 class="detail-title">Foto Bukti:</h5>
                    <img src="{{ asset('storage/' . $pelaporan->foto_bukti) }}" class="img-fluid" alt="Foto Bukti">
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="form-group mt-3">
    <a href="{{ route('pelaporan.riwayat') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</div>
@endsection
