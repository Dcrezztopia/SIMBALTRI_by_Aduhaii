@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text=primary-dark">
        Pengajuan Surat
    </div>
    <div class="card-body">
        <div class="container my-4">
            <form action="{{ route('surat.store') }}" method="POST" id="suratForm">
                @csrf
                <label for="input1" class="form-label">Nama : </label>
                <div class="mb-3">
                    <input type="text" class="form-control" id="input1" name="nama" required>
                    <small class="form-text text-danger" style="display: none;" id="namaError">Nama harus diisi.</small>
                </div>
                <label for="input2" class="form-label">Tanggal Lahir : </label>
                <div class="mb-3">
                    <input type="date" class="form-control" id="input2" name="tanggal_lahir" required>
                    <small class="form-text text-danger" style="display: none;" id="tanggalLahirError">Tanggal lahir harus diisi.</small>
                </div>
                <label for="input4" class="form-label">Kewarganegaraan : </label>
                <div class="mb-3">
                    <input type="text" class="form-control" id="input3" name="kewarganegaraan" required>
                    <small class="form-text text-danger" style="display: none;" id="kewarganegaraanError">Kewarganegaraan harus diisi.</small>
                </div>
                <label for="input4" class="form-label">Pekerjaan : </label>
                <div class="mb-3">
                    <input type="text" class="form-control" id="input4" name="pekerjaan" required>
                    <small class="form-text text-danger" style="display: none;" id="pekerjaanError">Pekerjaan harus diisi.</small>
                </div>
                <div class="mb-3">
                    <label for="input5" class="form-label">Alamat Rumah:</label>
                    <input type="text" class="form-control" id="input5" name="alamat_rumah" required>
                    <small class="form-text text-danger" style="display: none;" id="alamatRumahError">Alamat rumah harus diisi.</small>
                </div>
                <div class="mb-3">
                    <label for="input6" class="form-label">Kepentingan :</label>
                    <input type="text" class="form-control" id="input6" name="kepentingan" required>
                    <small class="form-text text-danger" style="display: none;" id="kepentinganError">Kepentingan harus diisi.</small>
                </div>
                <div class="mb-3">
                    <label for="input7" class="form-label">Perihal:</label>
                    <select class="form-control" id="input7" name="perihal" required>
                        <option value="pengantar_domisili">Pengantar Domisili</option>
                        <option value="pembuatan_KTP">Pembuatan KTP</option>
                        <option value="pengantar_kematian">Pengantar Kematian</option>
                        <option value="keterangan_tidak_mampu">Keterangan Tidak Mampu</option>
                    </select>
                    <small class="form-text text-danger" style="display: none;" id="perihalError">Perihal harus dipilih.</small>
                </div>
                <button type="button" class="btn btn-success mt-3" style="float: right;" id="customAlertButton">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </form>
        </div>
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
        document.getElementById('suratForm').submit();
    }

    function validateForm() {
        var nama = document.getElementById('input1').value;
        var tanggalLahir = document.getElementById('input2').value;
        var kewarganegaraan = document.getElementById('input3').value;
        var pekerjaan = document.getElementById('input4').value;
        var alamatRumah = document.getElementById('input5').value;
        var kepentingan = document.getElementById('input6').value;
        var perihal = document.getElementById('input7').value;

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

        if (pekerjaan.trim() === '') {
            document.getElementById('pekerjaanError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('pekerjaanError').style.display = 'none';
        }

        if (alamatRumah.trim() === '') {
            document.getElementById('alamatRumahError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('alamatRumahError').style.display = 'none';
        }

        if (kepentingan.trim() === '') {
            document.getElementById('kepentinganError').style.display = 'block';
            isValid = false;
        } else {
            document.getElementById('kepentinganError').style.display = 'none';
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
