@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-primary-dark">
        Kegiatan Warga
    </div>
    <div class="card-body">
        <div>
            @if($user->role == 'sekretaris_rw')
            <a href="{{ route('kegiatan.create') }}" class="btn btn-primary float-right mb-3">Tambah Kegiatan</a>
            @endif
        </div>
            <div class="table-responsive">

            <table class="w-100">
                <thead class="lin-gradient-light-primary">
                    <tr>
                        <th class="cell">No</th>
                        <th class="cell">Nama Kegiatan</th>
                        <th class="cell">Tanggal Pelaksanaan</th>
                        <th class="cell">Tempat Pelaksanaan</th>
                        <th class="cell">Penanggung Jawab</th>
            @if($user->role == 'sekretaris_rw')
                        <th class="cell">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if($kegiatanWarga->isEmpty())
                        <tr>
                            <td class="cell text-center" colspan="6">Tidak ada data kegiatan</td>
                        </tr>
                    @else
                    @foreach ($kegiatanWarga as $key => $kegiatan)
                    <tr>
                        <td class="cell">{{ $key + 1 }}</td>
                        <td class="cell">{{ $kegiatan->nama_kegiatan }}</td>
                        <td class="cell">{{ $kegiatan->tanggal_pelaksanaan }}</td>
                        <td class="cell">{{ $kegiatan->tempat_pelaksanaan }}</td>
                        <td class="cell">{{ $kegiatan->penanggungJawab->nama ?? 'N/A' }}</td>
                        <!-- Menampilkan nama penanggung jawab -->
            @if($user->role == 'sekretaris_rw')
                        <td class="cell">
                            <a href="{{ route('kegiatan.edit', $kegiatan->id_kegiatan) }}" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil"></i> Ubah
                            </a>
                            <!-- Form Delete -->
                            <form action="{{ route('kegiatan.destroy', $kegiatan->id_kegiatan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?');" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
