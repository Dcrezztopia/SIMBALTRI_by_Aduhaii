@extends('layout.app')

@section('content_body')
<div class="container">
    <h2>Detail Surat</h2>
    <div class="card">
        <div class="card-body">
            <p><strong>ID Surat:</strong> {{ $surat->id_surat }}</p>
            <p><strong>Nama:</strong> {{ $surat->nama }}</p>
            <p><strong>Tanggal Lahir:</strong> {{ $surat->tanggal_lahir }}</p>
            <p><strong>Kewarganegaraan:</strong> {{ $surat->kewarganegaraan }}</p>
            <p><strong>Pekerjaan:</strong> {{ $surat->pekerjaan }}</p>
            <p><strong>Alamat Rumah:</strong> {{ $surat->alamat_rumah }}</p>
            <p><strong>Kepentingan:</strong> {{ $surat->kepentingan }}</p>
            <p><strong>Perihal:</strong>
                @if($surat->perihal == 'pengantar_domisili')
                Pengantar Domisili
                @elseif($surat->perihal == 'pembuatan_KTP')
                Pembuatan KTP
                @elseif($surat->perihal == 'pengantar kematian')
                Pengantar Kematian
                @else
                Keterangan Tidak Mampu
                @endif
            </p>
            <p><strong>Status:</strong>
                @if($surat->status == 'menunggu')
                <span class="badge bg-warning text-dark">Menunggu</span>
                @elseif($surat->status == 'diterima')
                <span class="badge bg-success">Diterima</span>
                @elseif($surat->status == 'ditolak')
                <span class="badge bg-danger">Ditolak</span>
                @endif
            </p>
        </div>
    </div>
    <div class="form-group">
        <a href="{{ route('surat.riwayat') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
@endsection