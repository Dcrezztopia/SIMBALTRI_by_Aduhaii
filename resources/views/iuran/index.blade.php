@extends('layout.app')

@section('content_body')
<main id="main" class="main">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('iuran.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Iuran dan Iuran / Iuran Warga</li>
        </ol>
    </nav>
    <div class="pagetitle text-center">
        <h2 class="welcome-message-surat">Iuran Warga</h2>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kegiatan</th>
                                <th>Periode</th>
                                <th>Interval</th>
                                <th>Penanggung Jawab</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($iuranWarga as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->kegiatan->nama_kegiatan }}</td>
                                <td>{{ $item->periode }}</td>
                                <td>{{ $item->interval }}</td>
                                <td>{{ $item->penanggung_jawab }}</td>
                                <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('iuran.edit', $item->id_iuran) }}"
                                        class="btn btn-warning btn-sm">Ubah</a>
                                    <!-- Form Delete -->
                                    <form action="{{ route('iuran.destroy', $item->id_iuran) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus iuran ini?');"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection