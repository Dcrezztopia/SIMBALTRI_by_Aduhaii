<main id="main" class="main">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Pengajuan Surat</a></li>
            <li class="breadcrumb-item active" aria-current="page">Riwayat Surat</li>
        </ol>
    </nav>
    <div class="pagetitle text-center">
        <h2 class="welcome-message-surat">Riwayat Surat</h2>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Program Studi</th>
                                <th>Tahun Akademik</th>
                                <th>Status</th>
                                <th>Catatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data tabel disini -->
                            <tr>
                                <td>1</td>
                                <td>1234567890</td>
                                <td>John Doe</td>
                                <td>Manajemen</td>
                                <td>2023/2024</td>
                                <td><span class="badge rounded-pill text-bg-primary">Waiting</span>
                                </td>
                                <td>-</td>
                                <td>
                                    <!-- Tombol aksi disini -->
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </td>
                            </tr>
                            <!-- Akhir data tabel -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->