@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-primary-dark">
        Iuran Warga
    </div>
    <div class="card-body">
        <div class="">
            @if($user->role == 'bendahara_rw' || $user->role == "admin")
            <a href="{{ route('iuran.create') }}" class="btn btn-primary float-right mb-3">Tambah Iuran</a>
            @endif
        </div>
        <div class="table-responsive">
            <table class="w-100">
                <thead>
                    <tr>
                        <th class="cell">ID</th>
                        <th class="cell">Kegiatan</th>
                        <th class="cell">Periode</th>
                        <th class="cell">Interval</th>
                        <th class="cell">Penanggung Jawab</th>
                        <th class="cell">Total</th>
            @if($user->role == 'sekretaris_rw' || $user->role == "admin")
                        <th class="cell">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if($iuranWarga->isEmpty())
                        <tr>
                            <td class="cell text-center" colspan="7">Tidak ada data iuran</td>
                        </tr>
                    @else
                    @foreach ($iuranWarga as $iuran)
                        <tr>
                            <td class="cell">{{ $iuran->id_iuran }}</td>
                            <td class="cell">{{ $iuran->kegiatan->nama_kegiatan }}</td>
                            <td class="cell">{{ $iuran->periode }}</td>
                            <td class="cell">{{ $iuran->interval }}</td>
                            <td class="cell">{{ $iuran->warga->nama }}</td>
                            <td class="cell">{{ number_format($iuran->total, 0, ',', '.') }}</td>
            @if($user->role == 'sekretaris_rw' || $user->role == "admin")
                            <td class="cell">
                                <a href="{{ route('iuran.edit', $iuran->id_iuran) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                    Ubah
                                </a>
                                <form method="post" action="{{ route('iuran.destroy', $iuran->id_iuran) }}" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus iuran ini?')">
                                    <i class="bi bi-trash"></i>
                                    Hapus
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
