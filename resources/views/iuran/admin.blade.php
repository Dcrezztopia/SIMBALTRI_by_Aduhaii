@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-primary-dark">
        Iuran Warga
    </div>
    <div class="card-body">
                    <div class="">
                        <a href="{{ route('iuran.create') }}" class="btn btn-primary float-right mb-3">Tambah Iuran</a>
                    </div>
                        <table class="w-100">
                            <thead>
                                <tr>
                                    <th class="cell">ID</th>
                                    <th class="cell">Kegiatan</th>
                                    <th class="cell">Periode</th>
                                    <th class="cell">Interval</th>
                                    <th class="cell">Penanggung Jawab</th>
                                    <th class="cell">Total</th>
                                    <th class="cell">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($iuranWarga as $iuran)
                                    <tr>
                                        <td class="cell">{{ $iuran->id_iuran }}</td>
                                        <td class="cell">{{ $iuran->kegiatan->nama_kegiatan }}</td>
                                        <td class="cell">{{ $iuran->periode }}</td>
                                        <td class="cell">{{ $iuran->interval }}</td>
                                        <td class="cell">{{ $iuran->warga->nama }}</td>
                                        <td class="cell">{{ number_format($iuran->total, 0, ',', '.') }}</td>
                                        <td class="cell">
                                            <a href="{{ route('iuran.edit', $iuran->id_iuran) }}" class="btn btn-sm btn-warning">Ubah</a>
                                            <form method="post" action="{{ route('iuran.destroy', $iuran->id_iuran) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus iuran ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
    </div>
</div>
@endsection
