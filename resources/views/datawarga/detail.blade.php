@extends('layout.app')

@section('content_body')
<div class="container">
    <h2>Detail Data Warga</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>NIK:</strong> {{ $datawarga->nik }}</p>
            <p><strong>No Kartu Keluarga:</strong> {{ $datawarga->no_kk }}</p>
            <p><strong>Nama:</strong> {{ $datawarga->nama }}</p>
            <p><strong>Alamat Rumah:</strong> {{ $datawarga->alamat_rumah }}</p>
            <p><strong>RT:</strong> {{ $datawarga->RT }}</p>
            <p><strong>Agama:</strong> {{ $datawarga->agama }}</p>
            <p><strong>Jenis Kelamin:</strong>
                @if($datawarga->jenis_kelamin == 'L')
                LAKI-LAKI
                @else
                PEREMPUAN
                @endif
            </p>
            <p><strong>Tanggal Lahir:</strong> {{ $datawarga->tanggal_lahir }}</p>
            <p><strong>Tempat Lahir:</strong> {{ $datawarga->nama }}</p>
            <p><strong>Pendidikan:</strong> {{ $datawarga->pendidikan }}</p>
            <p><strong>Pekerjaan:</strong> {{ $datawarga->pekerjaan }}</p>
            <p><strong>Status Pernikahan:</strong> {{ $datawarga->status_pernikahan }}</p>
            <p><strong>Status Penduduk:</strong>
                @if($datawarga->status_penduduk == 'T')
                TETAP
                @elseif($datawarga->status_penduduk == 'P')
                PENDATANG
                @else
                WARGA ASING
                @endif
            </p>
        </div>
    </div>
    <div class="form-group">
        <button type="back" class="btn btn-danger mt-3" style="float: left;">
            <a  href="{{ route('datawarga.index') }}" class="bi bi-arrow-left-circle" style="color: white;">Kembali</a>
        </button>
    </div>
</div>
@endsection