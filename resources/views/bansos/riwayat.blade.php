@extends('layout.app')

@section('content_body')
<main id="main" class="main">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Home/Pengajuan Surat/ Pengajuan Surat</li>
      </ol>
    </nav>
    <div class="pagetitle text-center">
      <h2 class="welcome-message-surat">Surat Pernyataan</h2>
    </div><!-- End Page Title -->

    <div class="container my-4">
      <div class="card">
        <div class="card-body">
          <form>
            <label for="input1" class="form-label">Nama : </label>
            <div class="mb-3">
                <input type="text" class="form-control" id="input1" placeholder="Nama" value="{{ session('nama') }}" disabled>
            </div>
            <label for="input2" class="form-label">Tanggal Lahir : </label>
            <div class="mb-3">
                <input type="text" class="form-control" id="input2" placeholder="Tempat dan Tanggal Lahir" value="{{ session('tanggal_lahir') }}" disabled>
            </div>
            <label for="input3" class="form-label">Jenis Kelamin : </label>
            <div class="mb-3">
                <input type="text" class="form-control" id="input3" placeholder="Jenis Kelamin" value="{{ session('jenis_kelalmin') }}" disabled>
            </div>
            <label for="input4" class="form-label">Kewarganegaraan : </label>
            <div class="mb-3">
                <input type="text" class="form-control" id="input4" placeholder="Kewarganegaraan" value="{{ session('kewarganegaraan') }}" disabled>
            </div>
            <div class="mb-3">
                <label for="input5" class="form-label">Alamat Rumah:</label>
                <input type="text" class="form-control" id="input5" placeholder="Alamat Rumah" value="{{ session('alamat_rumah') }}" disabled>
            </div>
            <div class="mb-3">
                <label for="input7" class="form-label">Perihal:</label>
                <input type="text" class="form-control" id="input7" placeholder="Perihal" value="{{ session('perihal') }}" disabled>
            </div>
            <div class="mb-3">
                <label for="input7" class="form-label">Isi:</label>
                <input type="text" class="form-control" id="input7" placeholder="Perihal" value="{{ session('isi') }}" disabled>
            </div>
            <div class="mb-3">
              <label for="input7" class="form-label">Foto Bukti:</label>
              <img src="{{ Storage::url(session('foto_bukti')) }}" class="img-fluid" alt="Foto Bukti">
          </div>
        </form>
          <button class="btn btn-success mt-3" style="float: right;" onclick="showAlert()">
            <i class="bi bi-save"></i> Simpan
          </button>
        </div>
      </div>
    </div>

    <section class="section dashboard">
      <div class="row">
        <!-- Left side columns -->
        <!-- Add your content here -->
      </div>
    </section>
  </main><!-- End #main -->

@endsection
