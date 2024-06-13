@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary">
        Pengajuan Pelaporan
    </div>
    <div class="card-body">
        <form action="{{ route('pelaporan.store') }}" method="POST" enctype="multipart/form-data" id="pelaporanForm">
            @csrf
            <label for="input1" class="form-label">Nama : </label>
            <div class="mb-3">
                <input type="text" class="form-control" id="input1" name="nama">
                <small class="form-text text-danger" style="display: none;" id="namaError">Nama harus diisi.</small>
            </div>
            <label for="input2" class="form-label">Tempat dan Tanggal Lahir : </label>
            <div class="mb-3">
                <input type="date" class="form-control" id="input2" name="tanggal_lahir">
                <small class="form-text text-danger" style="display: none;" id="tanggalLahirError">Tempat dan tanggal lahir harus diisi.</small>
            </div>
            <div class="mb-3">
                <label for="input3" class="form-label">Jenis kelamin:</label>
                <select class="form-control" id="input3" name="jenis_kelamin">
                    <option value="L">Laki Laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
            <label for="input4" class="form-label">Kewarganegaraan : </label>
            <div class="mb-3">
                <input type="text" class="form-control" id="input4" name="kewarganegaraan">
                <small class="form-text text-danger" style="display: none;" id="kewarganegaraanError">Kewarganegaraan harus diisi.</small>
            </div>
            <div class="mb-3">
                <label for="input5" class="form-label">Alamat Rumah :</label>
                <input type="text" class="form-control" id="input5" name="alamat_rumah">
                <small class="form-text text-danger" style="display: none;" id="alamatRumahError">Alamat rumah harus diisi.</small>
            </div>
            <div class="mb-3">
                <label for="input6" class="form-label">Perihal :</label>
                <input type="text" class="form-control" id="input6" name="perihal">
                <small class="form-text text-danger" style="display: none;" id="perihalError">Perihal harus diisi.</small>
            </div>
            <div class="mb-3">
                <label for="input7" class="form-label">Isi :</label>
                <input type="text" class="form-control" id="input7" name="isi">
            </div>
            <div class="mb-3">
                <label for="inputFoto" class="form-label">Foto Bukti :</label>
                <input type="file" class="form-control" id="inputFoto" name="foto_bukti">
            </div>
            <button type="button" class="btn btn-success mt-3" style="float: right;" id="customAlertButton">
                <i class="bi bi-save"></i> Simpan
            </button>
        </form>
    </div>
</div>

<div id="customAlert" class="custom-alert">
    <h5>Accept Pengajuan</h5>
    <div class="alert-body">
        <p>Apakah Anda ingin mengirim pengajuan ini?</p>
    </div>
    <div class="alert-footer">
        <button class="btn btn-primary" onclick="closeAlert()">
            <i class="bi bi-x"></i> Close
        </button>
        <button class="btn btn-success" onclick="acceptPengajuan()">
            <i class="bi bi-file-earmark-check"></i> Accept
        </button>
    </div>
</div>

<script>
    document.getElementById("customAlertButton").addEventListener("click", function() {
        if (validateForm()) {
            showAlert();
        }
    });

    function showAlert() {
        var alert = document.getElementById('customAlert');
        alert.classList.add('show');
    }

    function closeAlert() {
        var alert = document.getElementById('customAlert');
        alert.classList.remove('show');
    }

    function acceptPengajuan() {
        document.getElementById('pelaporanForm').submit();
    }

    function validateForm() {
        var nama = document.getElementById('input1').value;
        var tanggalLahir = document.getElementById('input2').value;
        var kewarganegaraan = document.getElementById('input4').value;
        var alamatRumah = document.getElementById('input5').value;
        var perihal = document.getElementById('input6').value;

        var isValid = true;

        if (nama.trim() === '') {
            document.getElementById('namaError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('namaError').style.display = 'none';
        }

        if (tanggalLahir.trim() === '') {
            document.getElementById('tanggalLahirError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('tanggalLahirError').style.display = 'none';
        }

        if (kewarganegaraan.trim() === '') {
            document.getElementById('kewarganegaraanError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('kewarganegaraanError').style.display = 'none';
        }

        if (alamatRumah.trim() === '') {
            document.getElementById('alamatRumahError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('alamatRumahError').style.display = 'none';
        }

        if (perihal.trim() === '') {
            document.getElementById('perihalError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('perihalError').style.display = 'none';
        }

        return isValid;
    }
</script>

@endsection
