@extends('layout.app')

@section('content_body')
        <nav>
            <ol class="breadcrumb">
            <li class="breadcrumb-item active">Home/Pengajuan Surat/ Pengajuan Surat</li>
            </ol>
        </nav>
        <div class="pagetitle text-center">
            <h2 class="welcome-message-surat">Pengajuan Surat</h2>
        </div><!-- End Page Title -->

        <div class="container my-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('surat.store') }}" method="POST">
                    @csrf
                    <label for="input1" class="form-label">Nama : </label>
                    <div class="mb-3">
                    <input type="text" class="form-control" id="input1" name="nama">
                    </div>
                    <label for="input2" class="form-label">Tanggal Lahir : </label>
                    <div class="mb-3">
                    <input type="date" class="form-control" id="input2" name="tanggal_lahir">
                    </div>
                    <label for="input4" class="form-label">Kewarganegaraan : </label>
                    <div class="mb-3">
                    <input type="text" class="form-control" id="input3" name="kewarganegaraan">
                    </div>
                    <label for="input4" class="form-label">Pekerjaan : </label>
                    <div class="mb-3">
                    <input type="text" class="form-control" id="input4" name="pekerjaan">
                    </div>
                    <div class="mb-3">
                    <label for="input5" class="form-label">Alamat Rumah:</label>
                    <input type="text" class="form-control" id="input5" name="alamat_rumah">
                    </div>
                    <div class="mb-3">
                    <label for="input6" class="form-label">Kepentingan :</label>
                    <input type="text" class="form-control" id="input6" name="kepentingan">
                    </div>
                    <div class="mb-3">
                        <label for="input7" class="form-label">Perihal:</label>
                        <select class="form-control" id="input7" name="perihal">
                            <option value="pengantar_domisili">Pengantar Domisili</option>
                            <option value="pembuatan_KTP">Pembuatan KTP</option>
                            <option value="pengantar_kematian">Pengantar Kematian</option>
                            <option value="keterangan_tidak_mampu">Keterangan Tidak Mampu</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mt-3" style="float: right;" id="customAlert">
                        <i class="bi bi-save"></i> Simpan
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

    <div id="customAlert" class="custom-alert">
    <h5>Accept Pengajuan</h5>
    <div class="alert-body">
        <p>Apakah anda ingin mengirim pengajuan ini?</p>
    </div>
    <div class="alert-footer">
        <button class="btn btn-primary" onclick="closeAlert()">
        <i class="bi bi-x"></i> Close
        </button>
        <button class="btn btn-success" onclick="acceptPengajuan()">
        <i class="bi bi-file-earmark-check"></i> Accept
        </button>
    </div>
    </div>

    <script>
        function showAlert() {
            var alert = document.getElementById('customAlert');
            alert.classList.add('show');
            setTimeout(function() {
                acceptPengajuan();
            }, 7000); // Tunda 5 detik sebelum mengirim form
        }

    function closeAlert() {
        var alert = document.getElementById('customAlert');
        alert.classList.remove('show');
    }

    function acceptPengajuan() {
        window.location.href = "{{ route('surat.hasilform') }}";
    }

    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script> -->
@endsection
