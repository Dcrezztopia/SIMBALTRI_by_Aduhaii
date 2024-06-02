@extends('layout.app')

@section('content_body')
<main id="main" class="main">
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item active">Home/Pengajuan Surat/ Pengajuan Surat</li>
      </ol>
    </nav>
    <div class="pagetitle text-center">
      <h2 class="welcome-message-surat">Hasil Form</h2>
    </div><!-- End Page Title -->

    <div class="container my-4">
      <div class="card">
        <div class="card-body">
          <form>
            <label for="input1" class="form-label">Nama : </label>
            <div class="mb-3">
              <input type="text" class="form-control" id="input1" placeholder="Nama" disabled>
            </div>
            <label for="input2" class="form-label">Tempat dan Tanggal Lahir : </label>
            <div class="mb-3">
              <input type="text" class="form-control" id="input2" placeholder="Tempat dan Tanggal Lahir" disabled>
            </div>
            <label for="input3" class="form-label">Jenis Kelamin : </label>
            <div class="mb-3">
              <input type="text" class="form-control" id="input3" placeholder="Jenis Kelamin" disabled>
            </div>
            <label for="input4" class="form-label">Kewarganegaraan : </label>
            <div class="mb-3">
              <input type="text" class="form-control" id="input4" placeholder="Kewarganegaraan" disabled>
            </div>
            <div class="mb-3">
              <label for="input5" class="form-label">Alamat :</label>
              <input type="text" class="form-control" id="input5" placeholder="Alamat" disabled>
            </div>
            <div class="mb-3">
              <label for="input6" class="form-label">Hal :</label>
              <input type="text" class="form-control" id="input6" placeholder="Hal" disabled>
            </div>
            <div class="mb-3">
              <label for="input7" class="form-label">Pengajuan :</label>
              <input type="text" class="form-control" id="input7" placeholder="Pengajuan" disabled>
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
