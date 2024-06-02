@extends('layout.app')

@section('content_body')
<main id="main" class="main">
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home/Kegiatan dan Iuran/ Iuran Warga</li>
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
                                <th>Nama Kegiatan</th>
                                <th>Periode</th>
                                <th>Interval</th>
                                <th>Penanggung Jawab</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($iuranWarga as $iuran)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $iuran->kegiatan->nama_kegiatan }}</td>
                                <td>{{ $iuran->periode }}</td>
                                <td>{{ $iuran->interval }} {{ $iuran->interval == 1 ? 'bulan' : 'bulan' }}</td>
                                <td>{{ $iuran->penanggung_jawab }}</td>
                                <td>Rp. {{ number_format($iuran->total, 0, ',', '.') }}</td>
                                <td>
                            </tr>
                            @endforeach
                            <!-- Akhir data tabel -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection
