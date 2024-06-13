@extends('layout.app')

@section('content_body')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2>Edit Surat</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('surat.update', $surat->id_surat) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $surat->nama }}" placeholder="Masukkan nama lengkap">
                </div>
                <div class="mb-3">
                    <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $surat->tanggal_lahir }}">
                </div>
                <div class="mb-3">
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                    <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" value="{{ $surat->kewarganegaraan }}" placeholder="Masukkan kewarganegaraan">
                </div>
                <div class="mb-3">
                    <label for="pekerjaan" class="form-label">Pekerjaan</label>
                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $surat->pekerjaan }}" placeholder="Masukkan pekerjaan">
                </div>
                <div class="mb-3">
                    <label for="alamat_rumah" class="form-label">Alamat Rumah</label>
                    <input type="text" class="form-control" id="alamat_rumah" name="alamat_rumah" value="{{ $surat->alamat_rumah }}" placeholder="Masukkan alamat rumah">
                </div>
                <div class="mb-3">
                    <label for="kepentingan" class="form-label">Kepentingan</label>
                    <input type="text" class="form-control" id="kepentingan" name="kepentingan" value="{{ $surat->kepentingan }}" placeholder="Masukkan kepentingan">
                </div>
                <div class="mb-3">
                    <label for="perihal" class="form-label">Perihal</label>
                    <select class="form-control" id="perihal" name="perihal">
                        <option value="pengantar_domisili" {{ $surat->perihal == 'pengantar_domisili' ? 'selected' : '' }}>Pengantar Domisili</option>
                        <option value="pembuatan_KTP" {{ $surat->perihal == 'pembuatan_KTP' ? 'selected' : '' }}>Pembuatan KTP</option>
                        <option value="pengantar_kematian" {{ $surat->perihal == 'pengantar_kematian' ? 'selected' : '' }}>Pengantar Kematian</option>
                        <option value="keterangan_tidak_mampu" {{ $surat->perihal == 'keterangan_tidak_mampu' ? 'selected' : '' }}>Keterangan Tidak Mampu</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('surat.riwayat') }}" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
