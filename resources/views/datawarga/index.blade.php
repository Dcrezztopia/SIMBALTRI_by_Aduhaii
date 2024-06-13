@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-primary-dark">
        Data Warga
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
                </form>
                <a href="{{ route('datawarga.detail', $data->nik) }}"
                    class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                    title="Lihat detail data warga">
                    <i class="bi bi-eye"></i>
                </a>
                <a href="{{ route('datawarga.edit', $data->nik) }}"
                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit datawarga">
                    <i class="bi bi-pencil"></i>
                </a>
                <form action="{{ route('datawarga.destroy', $data->nik) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data warga ini?');"
                    class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Hapus data warga">
                        <i class="bi bi-trash"></i>
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
    </div>
</div>
@endsection
