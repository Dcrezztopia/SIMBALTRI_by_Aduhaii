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
                <th>Kewarganegaraan</th>
                <th>Pekerjaan</th>
                <th>Alamat_Rumah</th>
                <th>Kepentingan</th>
                <th>Perihal</th>
                <th>Tanggal_Dibuat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($surats as $surat)
              <tr>
                <td>{{ $surat->id_surat }}</td>
                <td>{{ $surat->nama }}</td>
                <td>{{ $surat->tanggal_lahir }}</td>
                <td>{{ $surat->kewarganegaraan }}</td>
                <td>{{ $surat->pekerjaan }}</td>
                <td>{{ $surat->alamat_rumah }}</td>
                <td>{{ $surat->kepentingan }}</td>
                <td>{{ $surat->perihal }}</td>
                <td>{{ $surat->created_at }}</td>
                <td>
                  <form action="{{ route('surat.destroy', $surat->id_surat) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?');">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit">
                      <i class="bi bi-trash"></i> Delete
                    </button>
                  </form>
                </td>
              </tr>
              @endforeach
              <!-- Akhir data tabel -->
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
</main><!-- End #main -->
@endsection
