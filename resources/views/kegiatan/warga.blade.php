@extends('layout.app')

@section('content_body')
<main id="main" class="main">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home/Kegiatan dan Iuran/ Iuran Warga</li>
        </ol>
    </nav>
    <div class="pagetitle text-center">
        <h2 class="welcome-message-surat">Kegiatan Warga</h2>
    </div><!-- End Page Title -->
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home/Kegiatan dan Iuran/ Iuran Warga</li>
        </ol>
    </nav>
    <div class="pagetitle text-center">
        <h2 class="welcome-message-surat">Kegiatan Warga</h2>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Tempat</th>
                                <th>Penanggung Jawab</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kegiatanWarga as $kegiatan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kegiatan->nama_kegiatan }}</td>
                                <td>{{ $kegiatan->tanggal_pelaksanaan }}</td>
                                <td>{{ $kegiatan->tempat_pelaksanaan }}</td>
                                <td>{{ $kegiatan->penanggung_jawab }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kegiatan</th>
                                <th>Tanggal Pelaksanaan</th>
                                <th>Tempat</th>
                                <th>Penanggung Jawab</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kegiatanWarga as $kegiatan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kegiatan->nama_kegiatan }}</td>
                                <td>{{ $kegiatan->tanggal_pelaksanaan }}</td>
                                <td>{{ $kegiatan->tempat }}</td>
                                <td>{{ $kegiatan->penanggung_jawab }}</td>
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
