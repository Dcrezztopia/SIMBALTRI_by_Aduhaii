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
        @if($user->role == 'sekretaris_rw' || $user->role == 'sekretaris_rt')
        <a href="{{ route('datawarga.create') }}" class="btn btn-primary float-right mb-3">Tambah Data</a>
        @endif
        <div class="table-responsive">
          <table class="w-100">
            <thead>
              <tr>
                <th class="cell">Nik</th>
                <th class="cell">Nama</th>
                <th class="cell">Jenis Kelamin</th>
                <th class="cell">Tanggal Lahir</th>
        @if($user->role == 'sekretaris_rw' || $user->role == 'sekretaris_rt')
                <th class="cell">Action</th>
                @endif
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
        @if($user->role == 'sekretaris_rw' || $user->role == 'sekretaris_rt')
                <td class="cell">
                <a href="{{ route('datawarga.detail', $data->nik) }}"
                    class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                    title="Lihat detail data warga">
                    <i class="bi bi-eye"></i>
                    Detail
                </a>
                <a href="{{ route('datawarga.edit', $data->nik) }}"
                    class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit datawarga">
                    <i class="bi bi-pencil"></i>
                    Ubah
                </a>
                <form action="{{ route('datawarga.destroy', $data->nik) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus data warga ini?');"
                    class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger" type="submit" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Hapus data warga">
                        <i class="bi bi-trash"></i>
                        Hapus
                    </button>
                </form>
                </td>
                @endif
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
