@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-primary-dark">
        Riwayat pelaporan
    </div>
    <div class="card-body">
  <section class="section dashboard">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Daftar Warga</div>
                <a href="{{ route('datawarga.create') }}" class="btn btn-primary float-right">Tambah Data</a>
            </div>
        </div>
        <div class="table-responsive">
          <table class="w-100">
            <thead>
              <tr>
                <th class="cell">Nik</th>
                <th class="cell">Nama</th>
                <th class="cell">Jenis Kelamin</th>
                <th class="cell">Tanggal Lahir</th>
                <th class="cell">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($dataWarga as $data)
              <tr>
                <td class="cell">{{ $data->nik }}</td>
                <td class="cell">{{ $data->nama }}</td>
                <td class="cell">
                    @if($data->jenis_kelamin == 'P')
                        Perempuan
                    @else
                        Laki-laki
                    @endif
                </td>
                <td class="cell">{{ $data->tanggal_lahir }}</td>
                <td class="cell">
                    {{-- Form Edit --}}
                    <a href="{{ route('datawarga.edit', $data->nik) }}"
                        class="btn btn-warning btn-sm">Ubah</a>
                    <!-- Form Delete -->
                    <form action="{{ route('datawarga.destroy', $data->nik) }}" method="POST"
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data warga ini?');"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
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
    </div>
</div>
@endsection
