@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary">
        Pengajuan Pelaporan
    </div>
    <div class="card-body">
        <form action="{{ route('pelaporan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="input1" class="form-label">Nama : </label>
            <div class="mb-3">
                <input type="text" class="form-control" id="input1" name="nama">
            </div>
            <label for="input2" class="form-label">Tempat dan Tanggal Lahir : </label>
            <div class="mb-3">
                <input type="date" class="form-control" id="input2" name="tanggal_lahir">
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
            </div>
            <div class="mb-3">
                <label for="input5" class="form-label">Alamat Rumah :</label>
                <input type="text" class="form-control" id="input5" name="alamat_rumah">
            </div>
            <div class="mb-3">
                <label for="input6" class="form-label">Perihal :</label>
                <input type="text" class="form-control" id="input6" name="perihal">
            </div>
            <div class="mb-3">
                <label for="input7" class="form-label">Isi :</label>
                <input type="text" class="form-control" id="input7" name="isi">
            </div>
            <div class="mb-3">
                <label for="inputFoto" class="form-label">Foto Bukti :</label>
                <input type="file" class="form-control" id="inputFoto" name="foto_bukti">
            </div>
            <button type="submit" class="btn btn-success mt-3" style="float: right;" id="customAlert">
                <i class="bi bi-save"></i> Simpan
            </button>
        </form>
    </div>
</div>




<div id="customAlert" class="custom-alert">
    <h5>Accept Pengajuan</h5>
    <div class="alert-body">
        <p>Apakah anda ingin mengirim pengajuan ini?</p>
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
    function showAlert() {
        var alert = document.getElementById('customAlert');
        alert.classList.add('show');
    }

    function closeAlert() {
        var alert = document.getElementById('customAlert');
        alert.classList.remove('show');
    }

    function acceptPengajuan() {
        window.location.href = "{{ route('pelaporan.hasilform') }}";
    }
</script>

<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script> -->

@endsection