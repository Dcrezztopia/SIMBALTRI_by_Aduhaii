@extends('layout.app')

@section('content_body')
  <div class="pagetitle text-center">
    <h2 class="welcome-message-pelaporan">Riwayat pelaporan</h2>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <div class="col-md-12">
        <div class="table-responsive">
          <table class="">
            <thead>
              <tr>
                <th class="cell">ID</th>
                <th class="cell">Nama</th>
                <th class="cell">Tanggal Lahir</th>
                <th class="cell">Jenis Kelamin</th>
                <th class="cell">Kewarganegaraan</th>
                <th class="cell">Alamat_Rumah</th>
                <th class="cell">Perihal</th>
                <th class="cell">Isi</th>
                <th class="cell">Foto Bukti</th>
                <th class="cell">Tanggal_Dibuat</th>
                <th class="cell">Action</th>
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
                  <img src="{{ Storage::url($pelaporan->foto_bukti) }}" alt="Foto Bukti" class="img-thumbnail" style="width: 150px; height: auto;">
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
@endsection
