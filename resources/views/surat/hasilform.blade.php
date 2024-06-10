@extends('layout.app')

@section('content_body')
<div class="card">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Surat Pengajuan</h4>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="surat">
                        <div class="header text-center">
                            <h3 class="judul-surat">Surat Pengajuan</h3>
                            <p class="info-surat">Nomor: [Nomor Surat] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tanggal: [Tanggal Surat]</p>
                        </div>
                        <div class="konten-surat">
                            <p>Kepada Yth.,</p>
                            <p class="alamat-penerima">[Nama Penerima]<br>[Alamat Penerima]</p>
                            <p>Dengan hormat,</p>
                            <p>Kami yang bertanda tangan di bawah ini:</p>
                            <ul>
                                <li>Nama: {{ session('nama') }}</li>
                                <li>Tempat, Tanggal Lahir: {{ session('tempat_lahir') }}, {{ session('tanggal_lahir') }}</li>
                                <li>Kewarganegaraan: {{ session('kewarganegaraan') }}</li>
                                <li>Pekerjaan: {{ session('pekerjaan') }}</li>
                                <li>Alamat: {{ session('alamat_rumah') }}</li>
                                <li>Kepentingan: {{ session('kepentingan') }}</li>
                                <li>Perihal: {{ session('perihal') }}</li>
                            </ul>
                            <p>Berikut kami sampaikan pengajuan surat dengan rincian tersebut di atas.</p>
                            <p>Demikian surat ini kami buat dengan sebenar-benarnya. Terima kasih atas perhatian dan kerjasamanya.</p>
                        </div>
                        <div class="footer text-center">
                            <p>Dikirim oleh:</p>
                            <p class="ttd">[Nama Pengirim]</p>
                            <p class="tgl-ttd">[Tanggal Tanda Tangan]</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn btn-success mt-3 float-end" onclick="showAlert()">
            <i class="bi bi-save"></i> Simpan
        </button>
    </div>
</div>

<script>
    function showAlert() {
        alert('Data berhasil disimpan!');
        window.location.href = "{{ route('surat.riwayat') }}"; // Ganti dengan route atau URL yang sesuai
    }
    </script>
@endsection
