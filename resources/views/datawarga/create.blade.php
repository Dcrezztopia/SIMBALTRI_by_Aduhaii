@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary">
        Input Data Warga
    </div>
    <div class="card-body">
        <form action="{{ route('datawarga.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="inputNik" class="form-label">NIK :</label>
                <input type="text" class="form-control" id="inputNik" name="nik" maxlength="16">
            </div>
            <div class="mb-3">
                <label for="inputNoKk" class="form-label">No KK :</label>
                <input type="text" class="form-control" id="inputNoKk" name="no_kk" maxlength="16">
            </div>
            <div class="mb-3">
                <label for="inputNama" class="form-label">Nama :</label>
                <input type="text" class="form-control" id="inputNama" name="nama" maxlength="100">
            </div>
            <div class="mb-3">
                <label for="inputAlamatRumah" class="form-label">Alamat Rumah :</label>
                <input type="text" class="form-control" id="inputAlamatRumah" name="alamat_rumah" maxlength="200">
            </div>
            <div class="mb-3">
                <label for="inputRT" class="form-label">RT :</label>
                <input type="text" class="form-control" id="inputRT" name="RT" maxlength="255">
            </div>
            <div class="mb-3">
                <label for="inputJenisKelamin" class="form-label">Jenis Kelamin :</label>
                <select class="form-control" id="inputJenisKelamin" name="jenis_kelamin">
                    <option value="L">Laki Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="inputAgama" class="form-label">Agama :</label>
                <input type="text" class="form-control" id="inputAgama" name="agama" maxlength="10">
            </div>
            <div class="mb-3">
                <label for="inputTanggalLahir" class="form-label">Tanggal Lahir :</label>
                <input type="date" class="form-control" id="inputTanggalLahir" name="tanggal_lahir">
            </div>
            <div class="mb-3">
                <label for="inputTempatLahir" class="form-label">Tempat Lahir :</label>
                <input type="text" class="form-control" id="inputTempatLahir" name="tempat_lahir" maxlength="25">
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
            <div class="mb-3">
                <label for="inputPekerjaan" class="form-label">Pekerjaan :</label>
                <input type="text" class="form-control" id="inputPekerjaan" name="pekerjaan" maxlength="25">
            </div>
            <div class="mb-3">
                <label for="inputStatusPernikahan" class="form-label">Status Pernikahan :</label>
                <select class="form-control" id="inputStatusPernikahan" name="status_pernikahan">
                    <option value="BELUM/TIDAK">Belum/Tidak Menikah</option>
                    <option value="MENIKAH">Menikah</option>
                    <option value="JANDA/DUDA">Janda/Duda</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="inputStatusPenduduk" class="form-label">Status Penduduk :</label>
                <select class="form-control" id="inputStatusPenduduk" name="status_penduduk">
                    <option value="T">Tetap</option>
                    <option value="P">Pendatang</option>
                    <option value="A">Asing</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success mt-3" style="float: right;">
                <i class="bi bi-save"></i> Simpan
            </button>
        </form>
    </div>
</div>
@endsection
