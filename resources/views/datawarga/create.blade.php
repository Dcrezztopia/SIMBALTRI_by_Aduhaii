@extends('layout.app')

@section('content_body')
<main id="main" class="main">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Data Warga/ Tambah Data</li>
        </ol>
    </nav>
    <div class="pagetitle text-center">
        <h2 class="welcome-message-surat">Tambah Data Warga</h2>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('datawarga.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="nik" class="col-md-4 col-form-label">NIK</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('nik') is-invalid @enderror"
                                        id="nik" name="nik" value="{{ old('nik') }}"
                                        required>
                                    @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no_kk" class="col-md-4 col-form-label">Nomor Kartu Keluarga</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('no_kk') is-invalid @enderror"
                                        id="no_kk" name="no_kk" value="{{ old('no_kk') }}"
                                        required>
                                    @error('no_kk')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nama" class="col-md-4 col-form-label">Nama Lengkap</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                        id="nama" name="nama" value="{{ old('nama') }}"
                                        required>
                                    @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="alamat_lengkap" class="col-md-4 col-form-label">Alamat Lengkap</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('alamat_lengkap') is-invalid @enderror"
                                        id="alamat_lengkap" name="alamat_lengkap" value="{{ old('alamat_lengkap') }}"
                                        required>
                                    @error('alamat_lengkap')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="RT" class="col-md-4 col-form-label">RT</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control @error('RT') is-invalid @enderror"
                                        id="RT" name="RT" value="{{ old('RT') }}"
                                        required>
                                    @error('RT')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="jenis_kelamin" class="col-md-4 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="jenis_kelamin" name="jenis_kelamin" value="L" required>
                                        <label class="form-check-label" for="jenis_kelamin">L</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="jenis_kelamin" name="jenis_kelamin" value="P" required>
                                            <label class="form-check-label" for="jenis_kelamin">P</label>
                                            </div>
                                            @error('jenis_kelamin')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                      </div>
                             </div>
                            <div class="row mb-3">
                                    <label for="agama" class="col-md-4 col-form-label">Agama</label>
                                            <div class="col-md-8">
                                                 <input type="text" class="form-control @error('agama') is-invalid @enderror"
                                                        id="agama" name="agama" value="{{ old('agama') }}"
                                                        required>
                                                    @error('agama')
                                                    <div class="invalid-feedback">
                                                            {{ $message }}
                                                    </div>
                                                            @enderror
                                             </div>
                                 </div>
                            <div class="row mb-3">
                                <label for="tanggal_lahir" class="col-md-4 col-form-label">Tanggal
                                    Lahir</label>
                                <div class="col-md-8">
                                    <input type="date"
                                        class="form-control @error('tanggal_lahir') is-invalid @enderror"
                                        id="tanggal_lahir" name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir') }}" required>
                                    @error('tanggal_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tempat_lahir" class="col-md-4 col-form-label">Tempat
                                    Lahir</label>
                                <div class="col-md-8">
                                    <input type="text"
                                        class="form-control @error('tempat_lahir') is-invalid @enderror"
                                        id="tempat_lahir" name="tempat_lahir"
                                        value="{{ old('tempat_lahir') }}" required>
                                    @error('tempat_lahir')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="pendidikan" class="form-label">Pendidikan Terakhir:</label>
                                <select class="form-control" id="pendidikan" name="pendidikan">
                                    <option value="TIDAK/BELUM SEKOLAH">TIDAK/BELUM SEKOLAH</option>
                                    <option value="BELUM TAMAT SD">BELUM TAMAT SD</option>
                                    <option value="TAMAT SD">TAMAT SD</option>
                                    <option value="SLTP/SEDERAJAT">SLTP/SEDERAJAT</option>
                                    <option value="SLTA/SEDERAJAT">SLTA/SEDERAJAT</option>
                                    <option value="DIPLOMA I/II">DIPLOMA I/II</option>
                                    <option value="DIPLOMA III">DIPLOMA III</option>
                                    <option value="DIPLOMA IV/STRATA I">DIPLOMA IV/STRATA I</option>
                                    <option value="STRATA II">STRATA II</option>
                                    <option value="STRATA III">STRATA III</option>
                                </select>
                            </div>
                            <div class="row mb-3">
                                <label for="pekerjaan" class="col-md-4 col-form-label">Pekerjaan</label>
                                <div class="col-md-8">
                                    <input type="text"
                                        class="form-control @error('pekerjaan') is-invalid @enderror"
                                        id="pekerjaan" name="pekerjaan"
                                        value="{{ old('pekerjaan') }}" required>
                                    @error('pekerjaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="status_pernikahan" class="col-md-4 col-form-label">Status Pernikahan</label>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="status_pernikahan" name="status_pernikahan" value="BELUM/TIDAK" required>
                                        <label class="form-check-label" for="status_pernikahan">BELUM/TIDAK</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="status_pernikahan" name="status_pernikahan" value="MENIKAH" required>
                                            <label class="form-check-label" for="status_pernikahan">MENIKAH</label>
                                            </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="status_pernikahan" name="status_pernikahan" value="JANDA/DUDA" required>
                                            <label class="form-check-label" for="status_pernikahan">JANDA/DUDA</label>
                                            </div>
                                            @error('status_pernikahan')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                      </div>
                             </div>
                            <div class="row mb-3">
                                <label for="status_penduduk" class="col-md-4 col-form-label">Status Penduduk</label>
                                <div class="col-md-8">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="status_penduduk" name="status_penduduk" value="T" required>
                                        <label class="form-check-label" for="status_penduduk">T</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="status_penduduk" name="status_penduduk" value="P" required>
                                            <label class="form-check-label" for="status_penduduk">P</label>
                                            </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input" id="status_penduduk" name="status_penduduk" value="A" required>
                                            <label class="form-check-label" for="status_penduduk">A</label>
                                            </div>
                                            @error('status_penduduk')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                                </div>
                                                @enderror
                                      </div>
                             </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('datawarga.index') }}" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
