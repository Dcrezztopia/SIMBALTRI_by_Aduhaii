<div class="sidebar">
    <!-- SidebarSearch Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search" style="background-color: #f8f9fa; color: #000;">
            <div class="input-group-append">
                <button class="btn btn-sidebar bg-light">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{ url('/') }}" class="nav-link text-dark {{ $activeMenu == 'dashboard' ? 'active' : '' }} ">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-header text-light">Data Pengguna</li>
            <li class="nav-item {{ $activeMenu == 'pengajuan_surat' ? 'menu-open' : '' }}">
                <a href="#" class="nav-link text-light{{ $activeMenu == 'pengajuan_surat' ? 'active' : '' }}">
                    <i class="nav-icon fas fa-envelope-open"></i>
                    <p>
                        Pengajuan Surat
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="pl-4 nav-item">
                        <a href="{{ url('/level') }}" class="nav-link text-light{{ $activeMenu == 'level' ? 'active' : '' }}">
                            <i class="fa fa-circle" aria-hidden="true"></i>
                            <p>Surat 1</p>
                        </a>
                    </li>
                    <li class="pl-4 nav-item">
                        <a href="{{ url('/type') }}" class="nav-link {{ $activeMenu == 'type' ? 'active' : '' }}">
                            <i class="fa fa-circle fa-1x" aria-hidden="true"></i>
                            <p>Surat 2</p>
                        </a>
                    </li>
                    <li class="pl-4 nav-item">
                        <a href="{{ url('/type') }}" class="nav-link {{ $activeMenu == 'type' ? 'active' : '' }}">
                            <i class="fa fa-circle fa-1x" aria-hidden="true"></i>
                            <p>Surat 3</p>
                        </a>
                    </li>
                    <!-- Tambahkan submenu lain di sini -->
                </ul>
            </li>
<li class="nav-item {{ $activeMenu == 'data_user' ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ $activeMenu == 'data_user' ? 'active' : '' }}">
        <i class="nav-icon far fa-sticky-note" aria-hidden="true"></i>
        <p>
            Pelaporan
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="pl-4 nav-item">
            <a href="{{ url('/user/profile') }}" class="nav-link {{ $activeMenu == 'profile' ? 'active' : '' }}">
                <i class="fa fa-circle nav-icon"></i>
                <p>Pelaporan 1</p>
            </a>
        </li>
        <li class="pl-4 nav-item">
            <a href="{{ url('/user/settings') }}" class="nav-link {{ $activeMenu == 'settings' ? 'active' : '' }}">
                <i class="fa fa-circle nav-icon"></i>
                <p>Pelaporan 2</p>
            </a>
        </li>
        <!-- Tambahkan submenu lain di sini -->
    </ul>
</li>


<li class="nav-header">Data Pengguna</li>
<li class="nav-item {{ $activeMenu == 'kategori' ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ $activeMenu == 'kategori' ? 'active' : '' }}">
        <i class="nav-icon far fa fa-indent" aria-hidden="true"></i>
        <p>
            Kegiatan dan Iuran
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="pl-4 nav-item">
            <a href="{{ url('/kategori/kegiatan') }}" class="nav-link {{ $activeMenu == 'kegiatan' ? 'active' : '' }}">
                <i class="fa fa-circle nav-icon"></i>
                <p>Kegiatan Warga</p>
            </a>
        </li>
        <li class="pl-4 nav-item">
            <a href="{{ url('/kategori/iuran') }}" class="nav-link {{ $activeMenu == 'iuran' ? 'active' : '' }}">
                <i class="fa fa-circle nav-icon"></i>
                <p>Iuran Warga</p>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item {{ $activeMenu == 'barang' ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ $activeMenu == 'barang' ? 'active' : '' }}">
        <i class="nav-icon far fa-handshake" aria-hidden="true"></i>
        <p>
            Bantuan Sosial
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="pl-4 nav-item">
            <a href="{{ url('/barang/list') }}" class="nav-link {{ $activeMenu == 'barang_list' ? 'active' : '' }}">
                <i class="fa fa-circle nav-icon"></i>
                <p>Bansos 1</p>
            </a>
        </li>
        <li class="pl-4 nav-item">
            <a href="{{ url('/barang/kategori') }}" class="nav-link {{ $activeMenu == 'barang_kategori' ? 'active' : '' }}">
                <i class="fa fa-circle nav-icon"></i>
                <p>Bansos 2</p>
            </a>
        </li>
    </ul>
</li>
</div>
