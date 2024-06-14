@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-dark">
        Home
    </div>
    <div class="card-body pa-5">
        <div class="text-center mt-3">
            <h2 class="text-primary-dark">
                <strong>
                    SELAMAT DATANG
                </strong>
            </h2>
            <h3 class="text-primary-dark">
                <strong>
                    DI PORTAL WEBSITE
                </strong>
            </h3>
            <h3 class="text-primary-dark">
                <strong>
                    KELURAHAN BALEARJOSARI
                </strong>
            </h3>
        </div><!-- End Page Title -->
        <!-- Add the new big box here -->
        <!-- <div class="big-box"> -->
        <!-- Content inside the box can go here if needed -->
        <div class="row mt-5">
            <div class="col">
                <button class="btn lin-gradient-light-primary w-100">
                    <a href="{{ route('surat.pengajuan') }}" class="text-primary-dark">
                        <h6 class="text-dark">
                            Pengajuan Surat
                        </h6>
                    </a>
                </button>
            </div>
            <div class="col-3">
                <button class="btn lin-gradient-light-primary w-100">
                    <a href="{{ route('surat.riwayat') }}" class="text-white">
                        <h6 class="text-dark">
                            Riwayat Pengajuan Surat
                        </h6>
                    </a>
                </button>
            </div>
            <div class="col">
                <button class="btn lin-gradient-light-primary w-100">
                    <a href="{{ route('pelaporan.lapor') }}" class="text-white">
                        <h6 class="text-dark">
                            Pengajuan Laporan
                        </h6>
                    </a>
                </button>
            </div>
            <div class="col-4">
                <button class="btn lin-gradient-light-primary w-100">
                    <a href="{{ route('pelaporan.riwayat') }}" class="text-white">
                        <h6 class="text-dark">
                            Riwayat Pengajuan Laporan
                        </h6>
                    </a>
                </button>
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header lin-gradient-light-primary">
                Kegiatan Berlangsung
            </div>
            <div class="card-body">
                <table class="w-100">
                    <thead>
                        <tr>
                            <th class="cell">Nama Kegiatan</th>
                            <th class="cell">Tanggal Kegiatan</th>
                            <th class="cell">Tempat Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kegiatanWarga as $kegiatan)
                        <tr>
                            <td class="cell">{{ $kegiatan->nama_kegiatan }}</td>
                            <td class="cell">{{ $kegiatan->tanggal_pelaksanaan }}</td>
                            <td class="cell">{{ $kegiatan->tempat_pelaksanaan }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection

@push('js')
    <script>
        $(document).ready(() => {
            // alert('Something')
        })
    </script>
@endpush

@push('css')
    <style>
        a {
                text-decoration: none !important;
            }
        /* button { */
        /*         width: 90px !important; */
        /*         height: 40px !important; */
        /*     } */
    </style>
@endpush

