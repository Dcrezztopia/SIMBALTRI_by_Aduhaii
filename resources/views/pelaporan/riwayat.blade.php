@extends('layout.app')

@section('content_body')
<main id="main" class="main">
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item active">Home/Pelaporan/ Riwayat Pelaporan</li>
    </ol>
  </nav>
  <div class="pagetitle text-center">
    <h2 class="welcome-message-pelaporan">Riwayat pelaporan</h2>
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
                <th>Alamat_Rumah</th>
                <th>Perihal</th>
                <th>Isi</th>
                <th>Foto Bukti</th>
                <th>Tanggal_Dibuat</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($pelaporans as $pelaporan)
              <tr>
                <td>{{ $pelaporan->id_pelaporan }}</td>
                <td>{{ $pelaporan->nama }}</td>
                <td>{{ $pelaporan->tanggal_lahir }}</td>
                <td>{{ $pelaporan->jenis_kelamin }}</td>
                <td>{{ $pelaporan->kewarganegaraan }}</td>
                <td>{{ $pelaporan->alamat_rumah }}</td>
                <td>{{ $pelaporan->perihal }}</td>
                <td>{{ $pelaporan->isi }}</td>
                <td>
                  <img src="{{ Storage::url($pelaporan->foto_bukti) }}" alt="Foto Bukti" class="img-thumbnail" style="width: 100px; height: auto;">
                </td>               
                 <td>{{ $pelaporan->created_at }}</td>
                <td>
                  <form action="{{ route('pelaporan.destroy', $pelaporan->id_pelaporan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pelaporan ini?');">
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
