

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
          <i class="bi bi-menu-button-wide"></i><span>Pengajuan Surat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pengajuan-surat-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link"href="{{ route('pengajuansurat.index') }}">
                <i class="bi bi-circle"></i><span>Pengajuan Surat</span>
            </a>
        </li>        
        <a class="nav-link" href="{{ route('riwayatsurat.index') }}">
          <i class="bi bi-circle"></i><span>Riwayat Surat</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#pelaporan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Pelaporan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pelaporan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link" href="{{ route('pelaporan.index') }}">
              <i class="bi bi-circle"></i><span>Pengajuan Lapor</span>
            </a>
          </li>
          <li>
            <a class="nav-link" href="{{ route('riwayatpelaporan.index') }}">
              <i class="bi bi-circle"></i><span>Riwayat Pelaporan</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->
      
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav5" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Kegiatan dan Iuran</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="components-nav5" class="nav-content collapse " data-bs-parent="#sidebar-nav">
              <li>
                <a class="nav-link" href="{{ route('kegiatandaniuran.index') }}">
                  <i class="bi bi-circle"></i><span>Kegiatan Warga</span>
                  </a>
              </li>
              <li>
                <a class="nav-link" href="{{ route('iuranwarga.index') }}">
                  <i class="bi bi-circle"></i><span>Iuran Warga</span>
                  </a>
              </li>
          </ul>
      </li><!-- End Components Nav -->
        
        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#components-nav34" data-bs-toggle="collapse" href="#">
              <i class="bi bi-menu-button-wide"></i><span>Bantuan Sosial</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav34" class="nav-content collapse " data-bs-parent="#sidebar-nav">
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
