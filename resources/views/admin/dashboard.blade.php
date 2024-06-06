@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-dark">
        Dashboard
    </div>
    <div class="card-body pa-5">
        <!-- <div class="text-center mt-3"> -->
        <!--     <h2 class="text-primary-dark"> -->
        <!--         <strong> -->
        <!--             SELAMAT DATANG -->
        <!--         </strong> -->
        <!--     </h2> -->
        <!--     <h3 class="text-primary-dark"> -->
        <!--         <strong> -->
        <!--             DI PORTAL WEBSITE -->
        <!--         </strong> -->
        <!--     </h3> -->
        <!--     <h3 class="text-primary-dark"> -->
        <!--         <strong> -->
        <!--             KELURAHAN BALEARJOSARI -->
        <!--         </strong> -->
        <!--     </h3> -->
        <!-- </div> -->
        <!-- Add the new big box here -->
        <!-- <div class="big-box"> -->
        <!-- Content inside the box can go here if needed -->
        <!-- </div> -->
        <!-- <div class="d-flex"> -->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header lin-gradient-light-primary text-dark">
                            Data Warga
                        </div>
                        <div class="card-body">
                        <!--total warga dll-->
                            <div>
                                Total RT: 12<br>
                                Total warga: 123<br>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header lin-gradient-light-primary text-dark">
                            Kegiatan Berlangsung
                        </div>
                        <div class="card-body">
                            <table>
                                <thead>
                                    <tr>
                                        <th class="cell">Nama Kegiatan</th>
                                        <th class="cell">Tanggal Kegiatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell">Kerja Bakti</td>
                                        <td class="cell">Minggu, 09-07-2024</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header lin-gradient-light-primary text-dark">
                            Surat Menunggu Persetujuan
                        </div>
                        <div class="card-body">
                            <table class="w-100">
                                <thead>
                                    <tr>
                                        <td class="cell">Nama Peminta</td>
                                        <td class="cell">Tanggal</td>
                                        <td class="cell">Perihal</td>
                                        <td class="cell">Actions</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="cell">Budi</td>
                                        <td class="cell">24-04-2024</td>
                                        <td class="cell">Pengantar Domisili</td>
                                        <td class="cell">
                                            <button class="btn btn-success">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cell">Anto</td>
                                        <td class="cell">21-04-2024</td>
                                        <td class="cell">Pembuatan KTP</td>
                                        <td class="cell">
                                            <button class="btn btn-success">
                                                <i class="fa-solid fa-check"></i>
                                            </button>
                                            <button class="btn btn-danger">
                                                <i class="fa-solid fa-x"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
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
    </style>
@endpush

