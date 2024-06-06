@extends('layout.app')

@section('content_body')
<main id="main" class="main">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Home/Pengajuan Surat/Detail Surat</li>
    </ol>
  </nav>
  <div class="pagetitle text-center">
    <h2 class="welcome-message-surat">Detail Surat</h2>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">k
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table">
              <tr>
                <th>ID</th>
                <td>{{ $surat->id_surat }}</td>
              </tr>
              <tr>
                <th>Nama</th>
                <td>{{ $surat->nama }}</td>
              </tr>
              <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $surat->tanggal_lahir }}</td>
              </tr>
              <tr>
                <th>Kewarganegaraan</th>
                <td>{{ $surat->kewarganegaraan }}</td>
              </tr>
              <tr>
                <th>Pekerjaan</th>
                <td>{{ $surat->pekerjaan }}</td>
              </tr>
              <tr>
                <th>Alamat Rumah</th>
                <td>{{ $surat->alamat_rumah }}</td>
              </tr>
              <tr>
                <th>Kepentingan</th>
                <td>{{ $surat->kepentingan }}</td>
              </tr>
              <tr>
                <th>Perihal</th>
                <td>{{ $surat->perihal }}</td>
              </tr>
              <tr>
                <th>Tanggal Dibuat</th>
                <td>{{ $surat->created_at }}</td>
              </tr>
              <tr>
                <th>Status</th>
                <td>
                  @if($surat->status == 'menunggu')
                    <span class="badge bg-warning text-dark">Menunggu</span>
                  @elseif($surat->status == 'diterima')
                    <span class="badge bg-success">Diterima</span>
                  @elseif($surat->status == 'ditolak')
                    <span class="badge bg-danger">Ditolak</span>
                  @endif
                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
