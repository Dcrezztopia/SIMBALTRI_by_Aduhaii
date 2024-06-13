@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-primary-dark">
        Hasil Form
    </div>
    <div class="card-body">
        <form>
            <label for="input1" class="form-label">Nama : </label>
            <div class="mb-3">
                <input type="text" class="form-control" id="input1" placeholder="Nama" value="{{ session('nama') }}" disabled>
            </div>
            <label for="input2" class="form-label">Tempat dan Tanggal Lahir : </label>
            <div class="mb-3">
                <input type="text" class="form-control" id="input2" placeholder="Tempat dan Tanggal Lahir" value="{{ session('tanggal_lahir') }}" disabled>
            </div>
            <label for="input3" class="form-label">Kewarganegaraan : </label>
            <div class="mb-3">
                <input type="text" class="form-control" id="input3" placeholder="Kewarganegaraan" value="{{ session('kewarganegaraan') }}" disabled>
            </div>
            <label for="input4" class="form-label">Pekerjaan : </label>
            <div class="mb-3">
                <input type="text" class="form-control" id="input4" placeholder="Pekerjaan" value="{{ session('pekerjaan') }}" disabled>
            </div>
            <div class="mb-3">
                <label for="input5" class="form-label">Alamat Rumah:</label>
                <input type="text" class="form-control" id="input5" placeholder="Alamat Rumah" value="{{ session('alamat_rumah') }}" disabled>
            </div>
            <div class="mb-3">
                <label for="input6" class="form-label">Kepentingan :</label>
                <input type="text" class="form-control" id="input6" placeholder="Kepentingan" value="{{ session('kepentingan') }}" disabled>
            </div>
            <div class="mb-3">
                <label for="input7" class="form-label">Perihal:</label>
                <input type="text" class="form-control" id="input7" placeholder="Perihal" value="{{ session('perihal') }}" disabled>
            </div>
        </form>


        <di v class="d-flex justify-content-between mt-3">
            <a href="{{ route('surat.riwayat') }}" class="btn btn-secondary">Kembali</a>
    </div>
</div>
</div>

@endsection