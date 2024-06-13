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
                    <input type="text" class="form-control" id="input1" name="nama">
                </div>
                <label for="input2" class="form-label">Tanggal Lahir : </label>
                <div class="mb-3">
                    <input type="date" class="form-control" id="input2" name="tanggal_lahir">
                </div>
                <label for="input4" class="form-label">Kewarganegaraan : </label>
                <div class="mb-3">
                    <input type="text" class="form-control" id="input3" name="kewarganegaraan">
                </div>
                <label for="input4" class="form-label">Pekerjaan : </label>
                <div class="mb-3">
                    <input type="text" class="form-control" id="input4" name="pekerjaan">
                </div>
                <div class="mb-3">
                    <label for="input5" class="form-label">Alamat Rumah:</label>
                    <input type="text" class="form-control" id="input5" name="alamat_rumah">
                </div>
                <div class="mb-3">
                    <label for="input6" class="form-label">Kepentingan :</label>
                    <input type="text" class="form-control" id="input6" name="kepentingan">
                </div>
                <div class="mb-3">
                    <label for="input7" class="form-label">Perihal:</label>
                    <select class="form-control" id="input7" name="perihal">
                        <option value="pengantar_domisili">Pengantar Domisili</option>
                        <option value="pembuatan_KTP">Pembuatan KTP</option>
                        <option value="pengantar_kematian">Pengantar Kematian</option>
                        <option value="keterangan_tidak_mampu">Keterangan Tidak Mampu</option>
                    </select>
                </div>
                <button type="button" class="btn btn-success mt-3" style="float: right;" id="customAlertButton">
                    <i class="bi bi-save"></i> Simpan
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById("customAlertButton").addEventListener("click", function() {
        if (confirm("Apakah Anda yakin ingin menyimpan data?")) {
            document.getElementById("suratForm").submit();
        }
    });
</script>

@endsection
