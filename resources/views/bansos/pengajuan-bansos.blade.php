@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-primary-dark">
        Pengajuan Bansos
    </div>
    <div class="card-body">
        <div class="container my-4">
                <form action="{{ route('pengajuan_bansos.store') }}" method="POST">
                @csrf
                <label for="input1" class="form-label">Nama:</label>
                <div class="mb-3">
                    <input type="text" class="form-control" id="input1" name="nama" required>
                </div>
                <label for="input2" class="form-label">NIK:</label>
                <div class="mb-3">
                    <input type="text" class="form-control" id="input2" name="nik" maxlength="16" required>
                </div>
                <label for="input3" class="form-label">No. KK:</label>
                <div class="mb-3">
                    <input type="text" class="form-control" id="input3" name="no_kk" maxlength="16" required>
                </div>
                <label for="input4" class="form-label">Kondisi Rumah:</label>
                <div class="mb-3">
                    <select class="form-control" id="input4" name="kondisi_rumah" required>
                        <option value="SEMPURNA">SEMPURNA</option>
                        <option value="BAIK">BAIK</option>
                        <option value="LAYAK">LAYAK</option>
                        <option value="BURUK">BURUK</option>
                    </select>
                </div>
                <label for="input5" class="form-label">Luas Rumah (m²):</label>
                <div class="mb-3">
                    <input type="number" class="form-control" id="input5" name="luas_rumah" min="0" required>
                </div>
                <label for="input6" class="form-label">Status Pernikahan:</label>
                <div class="mb-3">
                    <select class="form-control" id="input6" name="status_pernikahan" required>
                        <option value="BELUM/TIDAK">BELUM/TIDAK</option>
                        <option value="MENIKAH">MENIKAH</option>
                        <option value="JANDA/DUDA">JANDA/DUDA</option>
                    </select>
                </div>
                <label for="input7" class="form-label">Pekerjaan:</label>
                <div class="mb-3">
                    <input type="text" class="form-control" id="input7" name="pekerjaan" maxlength="25" required>
                </div>
                <label for="input8" class="form-label">Jumlah Tanggungan:</label>
                <div class="mb-3">
                    <input type="number" class="form-control" id="input8" name="jml_tanggungan" min="0" required>
                </div>
                <label for="input9" class="form-label">Jumlah Pendapatan (Rp):</label>
                <div class="mb-3">
                    <input type="number" class="form-control" id="input9" name="jml_pendapatan" min="0" required>
                </div>
                <label for="input10" class="form-label">Tagihan Listrik (Rp):</label>
                <div class="mb-3">
                    <input type="number" class="form-control" id="input10" name="tag_listrik" min="0" required>
                </div>
                <label for="input11" class="form-label">Tagihan Air (Rp):</label>
                <div class="mb-3">
                    <input type="number" class="form-control" id="input11" name="tag_air" min="0" required>
                </div>
                <button type="submit" class="btn btn-success mt-3" style="float: right;">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>

<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <!-- Add your content here -->
    </div>
</section>

<div id="customAlert" class="custom-alert">
    <h5>Konfirmasi Pengajuan</h5>
    <div class="alert-body">
        <p>Apakah Anda yakin ingin mengirim pengajuan ini?</p>
    </div>
    <div class="alert-footer">
        <button class="btn btn-primary" onclick="closeAlert()">
            <i class="bi bi-x"></i> Batal
        </button>
        <button class="btn btn-success" onclick="acceptPengajuan()">
            <i class="bi bi-file-earmark-check"></i> Kirim
        </button>
    </div>
</div>

<script>
    function showAlert() {
        var alert = document.getElementById('customAlert');
        alert.classList.add('show');
    }

    function closeAlert() {
        var alert = document.getElementById('customAlert');
        alert.classList.remove('show');
    }

    function acceptPengajuan() {
        document.querySelector('form').submit();
    }

    document.querySelector('button[type="submit"]').addEventListener('click', function(event) {
        event.preventDefault();
        showAlert();
    });
</script>

@endsection
