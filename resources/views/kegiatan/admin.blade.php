@extends('layout.app')

@section('content_body')
<main id="main" class="main">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Kegiatan dan Iuran/ Kegiatan</li>
        </ol>
    </nav>
    <div class="pagetitle text-center">
        <h2 class="welcome-message-surat">Kegiatan Warga</h2>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Daftar Kegiatan</div>
                        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary float-right">Tambah Kegiatan</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kegiatan</th>
                                    <th>Tanggal Pelaksanaan</th>
                                    <th>Tempat Pelaksanaan</th>
                                    <th>Penanggung Jawab</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kegiatanWarga as $key => $kegiatan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $kegiatan->nama_kegiatan }}</td>
                                    <td>{{ $kegiatan->tanggal_pelaksanaan }}</td>
                                    <td>{{ $kegiatan->tempat_pelaksanaan }}</td>
                                    <td>{{ $kegiatan->penanggung_jawab }}</td>
                                    <td>
                                        <a href="{{ route('kegiatan.edit', $kegiatan->id_kegiatan) }}"
                                            class="btn btn-sm btn-info">Ubah</a>
                                        <!-- Form Delete -->
                                        <form action="{{ route('kegiatan.destroy', $kegiatan->id_kegiatan) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kegiatan ini?');" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <i class="bi bi-trash"></i> Delete
                                            </button>
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
</main>
@endsection
