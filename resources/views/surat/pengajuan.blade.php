@extends('layout.app')

@section('content_body')
    <!-- <nav> -->
    <!--     <ol class="rounded float-right"> -->
    <!--         <li class=""> -->
    <!--             Home/Pengajuan Surat/ Pengajuan Surat -->
    <!--         </li> -->
    <!--     </ol> -->
    <!-- </nav> -->
    <div class="container my-2">
        <!-- <div class="text-center"> -->
        <!--     <h2 class="welcome-message-surat">Surat</h2> -->
        <!-- </div> -->

        <div class="card">
            <div class="card-header lin-gradient" id="umumHeading">
                    Pengajuan Surat
            </div>

            <div class="card-body">
                <form id="main_form" action="{{ route('surat.pengajuan.post') }}" method="post">
                    @csrf
                    <label for="nama" class="form-label">Nama : </label>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama" name="nama_pemohon" required>
                    </div>
                    <label class="form-label">Tempat dan Tanggal Lahir : </label>
                    <div class="mb-3 row">
                        <div class="col">
                            <input type="text" class="form-control col-sm" id="tempat_lahir" name="tempat_lahir" required>
                        </div>
                        <div class="col-4">
                            <input type="date" class="form-control col-md" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                    </div>
                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin : </label>
                    <div class="mb-3">
                        <select name="jenis_kelamin" class="form-control" pattern="/^(L|P)$/" required>
                            <option disabled selected value> -- select an option -- </option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan : </label>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
                    </div>
                    <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat :</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="mb-3">
                    <label for="hal" class="form-label">Hal :</label>
                        <input type="text" class="form-control" id="hal" name="hal" required>
                    </div>
                    <div class="mb-3">
                    <label for="pengajuan" class="form-label">Pengajuan :</label>
                        <input type="text" class="form-control" id="pengajuan" name="pengajuan" required>
                    </div>
                    <button type="button" class="btn btn-success ma-3" onclick="showAlert()">
                        <i class="bi bi-save"></i>
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>

    <section class="section dashboard">
        <div class="row">
        <!-- Left side columns -->
        <!-- Add your content here -->
        </div>
    </section>

    <div id="alert-bg" onclick="closeAlert()"> </div>

    <div id="customAlert" class="custom-alert">
        <h5>Accept Pengajuan</h5>
        <div class="alert-body">
            <p>Apakah anda ingin mengirim pengajuan ini?</p>
        </div>
        <div class="alert-footer">
            <button class="btn btn-primary" onclick="closeAlert()" type="button">
                <i class="bi bi-x"></i> Close
            </button>
            <button class="btn btn-success" type="submit" form="main_form">
                <i class="bi bi-file-earmark-check"></i> Accept
            </button>
        </div>
    </div>

    <script>
    function showAlert() {
        var alertBg = document.getElementById('alert-bg');
        alertBg.style.display = 'block';
        var alert = document.getElementById('customAlert');
        alert.classList.add('show');
    }

    function closeAlert() {
        var alertBg = document.getElementById('alert-bg');
        alertBg.style.display = 'none';
        var alert = document.getElementById('customAlert');
        alert.classList.remove('show');
    }

    function acceptPengajuan() {
        window.location.href = "{{ route('surat.hasilform') }}";
    }

    </script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script> -->
@endsection

@push('css')
<style>
    #alert-bg {
        background-color: rgba(0, 0, 0, 0);
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
        display: none;
    }

    #customAlert {
        position: fixed;
    }

    .welcome-message-surat {
        font-size: 4em;
        font-weight: bold;
        color: #006778;
        text-align: left;
    }

    @media (max-width: 1199px) {
        .welcome-message-surat {
            font-size: 2em;
        }
    }
</style>
@endpush
