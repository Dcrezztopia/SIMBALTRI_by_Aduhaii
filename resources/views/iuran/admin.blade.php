@extends('layout.app')

@section('content_body')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Iuran Warga</li>
        </ol>
    </nav>
    <div class="pagetitle text-center">
        <h2 class="welcome-message-surat">Iuran Warga</h2>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Daftar Iuran</div>
                        <a href="{{ route('iuran.create') }}" class="btn btn-primary float-right">Tambah Iuran</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kegiatan</th>
                                    <th>Periode</th>
                                    <th>Interval</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($iuranWarga as $iuran)
                                    <tr>
                                        <td>{{ $iuran->id_iuran }}</td>
                                        <td>{{ $iuran->kegiatan->nama_kegiatan }}</td>
                                        <td>{{ $iuran->periode }}</td>
                                        <td>{{ $iuran->interval }}</td>
                                        <td>{{ $iuran->warga->nama }}</td>
                                        <td>{{ number_format($iuran->total, 0, ',', '.') }}</td>
                                        <td>
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
            </div>
        </div>
    </section>
@endsection
