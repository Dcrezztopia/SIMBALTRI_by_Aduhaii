@extends('layout.app')

@section('content_body')
<main id="main" class="main">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Kegiatan dan Iuran/ Kegiatan</li>
        </ol>
    </nav>
    <div class="pagetitle text-center">
        <h2 class="welcome-message-surat">Ubah Kegiatan Warga</h2>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('kegiatan.update', $kegiatanWarga->id_kegiatan) }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $kegiatanWarga->id_kegiatan }}">
                            <div class="row mb-3">
                                <label for="nama_kegiatan" class="col-md-4 col-form-label">Nama Kegiatan</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror" id="nama_kegiatan" name="nama_kegiatan" value="{{ $kegiatanWarga->nama_kegiatan }}" required>
                                    @error('nama_kegiatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal_pelaksanaan" class="col-md-4 col-form-label">Tanggal Pelaksanaan</label>
                                <div class="col-md-8">
                                    <input type="date" class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror" id="tanggal_pelaksanaan" name="tanggal_pelaksanaan" value="{{ $kegiatanWarga->tanggal_pelaksanaan }}" required>
                                        @error('tanggal_pelaksanaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="tempat_pelaksanaan" class="col-md-4 col-form-label">Tempat Pelaksanaan</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control @error('tempat_pelaksanaan') is-invalid @enderror" id="tempat_pelaksanaan" name="tempat_pelaksanaan" value="{{ $kegiatanWarga->tempat_pelaksanaan }}" required>
                                        @error('tempat_pelaksanaan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="penanggung_jawab" class="col-md-4 col-form-label">Penanggung Jawab</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control @error('penanggung_jawab') is-invalid @enderror" id="penanggung_jawab" name="penanggung_jawab" value="{{ $kegiatanWarga->penanggung_jawab }}" required>
                                        @error('penanggung_jawab')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection
