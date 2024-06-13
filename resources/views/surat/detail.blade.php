@extends('layout.app')

@section('content_body')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Detail Surat</h2>
    <div class="card shadow border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Informasi Surat</h4>
        </div>
        <div class="card-body">
            <ul class="nav nav-tabs" id="detailSuratTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="informasi-umum-tab" data-bs-toggle="tab" href="#informasi-umum" role="tab" aria-controls="informasi-umum" aria-selected="true">Informasi Umum</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="informasi-lainnya-tab" data-bs-toggle="tab" href="#informasi-lainnya" role="tab" aria-controls="informasi-lainnya" aria-selected="false">Informasi Lainnya</a>
                </li>
            </ul>
            <div class="tab-content" id="detailSuratTabContent">
                <div class="tab-pane fade show active" id="informasi-umum" role="tabpanel" aria-labelledby="informasi-umum-tab">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <p><strong>ID Surat:</strong> {{ $surat->id_surat }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Nama:</strong> {{ $surat->nama }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Tanggal Lahir:</strong> {{ $surat->tanggal_lahir }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Kewarganegaraan:</strong> {{ $surat->kewarganegaraan }}</p>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="informasi-lainnya" role="tabpanel" aria-labelledby="informasi-lainnya-tab">
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <p><strong>Pekerjaan:</strong> {{ $surat->pekerjaan }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Alamat Rumah:</strong> {{ $surat->alamat_rumah }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Kepentingan:</strong> {{ $surat->kepentingan }}</p>
                        </div>
                        <div class="col-md-6">
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
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
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
                </div>
            </div>
        </div>
    </div>
    <div class="mt-4 text-center">
        <a href="{{ route('surat.riwayat') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
</div>
@endsection
