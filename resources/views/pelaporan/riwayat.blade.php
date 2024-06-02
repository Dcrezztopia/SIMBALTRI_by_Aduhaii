@extends('layout.app')

@section('content_body')
<main id="main" class="main">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Home/Pelaporan/ Riwayat Pelaporan</li>
    </ol>
  </nav>
  <div class="pagetitle text-center">
    <h2 class="welcome-message-surat">Riwayat Surat</h2>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Kewarganegaraan</th>
                <th>Alamat</th>
                <th>Perihal</th>
                <th>Isi</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Proses</td>
                <td>Proses</td>
                <td>Proses</td>
                <td>Proses</td>
                <td>Proses</td>
                <td>Proses</td>
                <td>Proses</td>
                <td>Proses</td>
                <td>
                  <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                </td>
              </tr>
              <!-- Akhir data tabel -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
