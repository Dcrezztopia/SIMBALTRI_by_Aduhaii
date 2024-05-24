

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="">
        <a class="nav-link collapsed" href="{{ route('layout.all') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Pages</li>

      

      <li class="nav-item">
        <a class="nav-link collapsed active" data-bs-target="#pengajuan-surat-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span style="color: white;">Pengajuan Surat</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="pengajuan-surat-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">
          <li>
            <a class="nav-link" href="{{ route('pengajuansurat.index') }}">
              <i class="bi bi-circle"></i><span>Pengajuan Surat</span>
            </a>
          </li>        
          <li>
            <a class="nav-link" href="{{ route('riwayatsurat.index') }}">
              <i class="bi bi-circle"></i><span style="color: white">Riwayat Surat</span>
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
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Pelaporan 1</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Pelaporan 2</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Pelaporan 3</span>
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
          <a class="nav-link collapsed" data-bs-target="#components-nav4" data-bs-toggle="collapse" href="#">
            <i class="bi bi-menu-button-wide"></i><span>Bantuan Sosial</span><i></i>
          </a>
        </li><!-- End Components Nav -->

    </ul>

  </aside><!-- End Sidebar-->
