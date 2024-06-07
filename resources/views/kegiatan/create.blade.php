@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-primary-dark">
        Tambah Kegiatan Warga
    </div>
    <div class="card-body">
                        <form method="POST" action="{{ route('kegiatan.index') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="nama_kegiatan" class="col-md-4 col-form-label">Nama Kegiatan</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('nama_kegiatan') is-invalid @enderror"
                                        id="nama_kegiatan" name="nama_kegiatan" value="{{ old('nama_kegiatan') }}"
                                        required>
                                    @error('nama_kegiatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tanggal_pelaksanaan" class="col-md-4 col-form-label">Tanggal
                                    Pelaksanaan</label>
                                <div class="col-md-8">
                                    <input type="date"
                                        class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror"
                                        id="tanggal_pelaksanaan" name="tanggal_pelaksanaan"
                                        value="{{ old('tanggal_pelaksanaan') }}" required>
                                    @error('tanggal_pelaksanaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat_pelaksanaan" class="col-md-4 col-form-label">Tempat
                                    Pelaksanaan</label>
                                <div class="col-md-8">
                                    <input type="text"
                                        class="form-control @error('tempat_pelaksanaan') is-invalid @enderror"
                                        id="tempat_pelaksanaan" name="tempat_pelaksanaan"
                                        value="{{ old('tempat_pelaksanaan') }}" required>
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
                                    <select class="form-control @error('penanggung_jawab') is-invalid @enderror" id="penanggung_jawab" name="penanggung_jawab" required>
                                        <option value="">Pilih Penanggung Jawab</option>
                                        @foreach($data_warga as $warga)
                                            <option value="{{ $warga->nik }}">{{ $warga->nama }} ({{ $warga->nik }})</option>
                                        @endforeach
                                    </select>
                                    @error('penanggung_jawab')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary text-light">Simpan</button>
                                <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
    </div>
</div>
@endsection
