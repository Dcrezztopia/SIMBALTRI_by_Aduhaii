@extends('layout.app')

@section('content_body')
<main id="main" class="main">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Iuran Warga</li>
        </ol>
    </nav>
    <div class="pagetitle text-center">
        <h2 class="welcome-message-surat">Daftar Iuran Warga</h2>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Iuran</th>
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
                                        <td>{{ $iuran->penanggung_jawab }}</td>
                                        <td>{{ number_format($iuran->total, 0, ',', '.') }}</td>
                                        <td>
                                            <a href="{{ route('iuran.edit', $iuran->id_iuran) }}"
                                                class="btn btn-sm btn-warning">Ubah</a>
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
        </div>
    </section>
</main>
@endsection
