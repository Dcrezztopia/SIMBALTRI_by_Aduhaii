@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header lin-gradient-light-primary text-dark">
        Dashboard
    </div>
    <div class="card-body pa-5">
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header lin-gradient-light-primary text-dark">
                        Distribusi Umur Warga
                    </div>
                    <div class="card-body">
                        <canvas id="umurChart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header lin-gradient-light-primary text-dark">
                        Distribusi Pendidikan
                    </div>
                    <div class="card-body">
                        <canvas id="pendidikanChart"></canvas>
                    </div>
                </div>
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
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header lin-gradient-light-primary text-dark">
                        Kegiatan Berlangsung
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="w-100">
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
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header lin-gradient-light-primary text-dark">
                        Surat Menunggu Persetujuan
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
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
        </div>
        </div>
        </div>

@endsection

@push('scripts')
{{-- Umur --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('umurChart').getContext('2d');
        var umurChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['0-10', '11-20', '21-30', '31-40', '41-50', '51-60', '61+'],
                datasets: [{
                    data: @json(array_values($umurKelompok)),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });
    });
</script>
{{-- Pendidikan --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var ctx = document.getElementById('pendidikanChart').getContext('2d');
        var pendidikanChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['SLTA/Sederajat', 'SLTP/Sederajat', 'Tidak / Belum Sekolah', 'Belum Tamat SD/Sederajat', 'DIPLOMA I / II', 'DIPLOMA IV/STRATA I', 'Tidak Memiliki Pendidikan'],
                datasets: [{
                    data: @json(array_values($pendidikanKelompok)),
                    backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#FF6384']
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                }
            }
        });
    });
</script>
@endpush

@push('css')
    <style>
        #umurChart {
            width: 430px !important;
            height: 430px !important;
        }d
        #pendidikanChart {
            width: 430px !important;
            height: 430px !important;
        }
    </style>
@endpush
