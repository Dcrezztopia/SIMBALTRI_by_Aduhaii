<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="">
            <a class="nav-link active" href="">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#pengajuan-surat-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-envelope-arrow-up fs-4"></i><span>Pengajuan Surat</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="pengajuan-surat-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="nav-link" href="{{ route('pengajuansurat.index') }}">
                        <i class="bi bi-circle"></i><span>Pengajuan Surat</span>
                    </a>
                </li>
                <a class="nav-link" href="{{ route('riwayatsurat.index') }}">
                    <i class="bi bi-circle"></i><span>Riwayat Surat</span>
                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-danger rounded-circle">
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </a>
        </li>
    </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pelaporan-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-clipboard2 fs-4"></i><span>Pelaporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pelaporan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
            <li>
                <a class="nav-link" href="{{ route('pengajuanlaporan.index') }}">
                    <i class="bi bi-circle"></i><span>Pengajuan Laporan</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('riwayatlaporan.index') }}">
                    <i class="bi bi-circle"></i><span>Riwayat Pelaporan</span>
                </a>
            </li>
        </ul>
    </li><!-- End Components Nav -->


    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav5" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journals fs-4"></i><span>Kegiatan dan Iuran</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav5" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="components-alerts.html">
                    <i class="bi bi-circle"></i><span>Kegiatan Warga</span>
                </a>
            </li>
            <li>
                <a href="components-accordion.html">
                    <i class="bi bi-circle"></i><span>Iuran Warga</span>
                </a>
            </li>
        </ul>
    </li><!-- End Components Nav -->

    <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav34" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-arms-up fs-4"></i><span>Bantuan Sosial</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
                <a href="components-alerts.html">
                    <i class="bi bi-circle"></i><span>Riwayat Bansos</span>
                </a>
            </li>
            <li>
                <a href="components-accordion.html">
                    <i class="bi bi-circle"></i><span>Pengajuan Bansos</span>
                </a>
            </li>
            <li>
                <a href="components-accordion.html">
                    <i class="bi bi-circle"></i><span>Permintaan Bansos</span>
                </a>
            </li>
            <li>
                <a href="components-accordion.html">
                    <i class="bi bi-circle"></i><span>Data Bansos</span>
                </a>
            </li>
        </ul>
    </li><!-- End Components Nav -->
    </ul>

    </ul>












































</aside><!-- End Sidebar-->
