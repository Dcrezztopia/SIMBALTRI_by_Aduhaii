<aside id="sidebar" class="sidebar">
    <i class="bi bi-caret-left toggle-sidebar-btn sidebar-btn" style="float: right"></i>
    <ul class="sidebar-nav" id="sidebar-nav">
        <img src="{{ asset('assets/img/simbaltri.png') }}" alt="" style="width: 150px; height: 300;">

        <li class="nav-item">
            <a class="nav-link @if($activeSidebarItem[0] == 'dashboard') active @else collapsed @endif" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>

        @foreach ($sidebarItems as $key => $item)
            <li class="nav-item">
                @if(isset($item['route']))
                    {{-- WARNA PERLU DIBENARKAN AKU GAK NGERTI KUDU WARNA OPO --}}
                    <a class="nav-link collapsed text-primary @if($activeSidebarItem[0] == $key) active @endif" href="{{ route($item['route']) }}">
                        <i class="bi {{ $item['icon'] }}"></i><span>{{ $item['label'] }}
                    </a>
                @else
                    <a class="nav-link collapsed @if($activeSidebarItem[0] == $key) active @endif" data-bs-target="#{{ $key }}-nav" data-bs-toggle="collapse" style="cursor: pointer">
                        <i class="bi {{ $item['icon'] }}"></i><span>{{ $item['label'] }}</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                @endif
                <ul id="{{ $key }}-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    @foreach ($item['children'] as $childKey => $child)
                        <li>
                            <a class="nav-link @if($activeSidebarItem[0] == $key && $activeSidebarItem[1] == $childKey) active @endif" href="{{ route($child['route']) }}">
                                <i class="bi {{ $child['icon'] }}"></i><span>{{ $child['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
  </aside><!-- End Sidebar-->

  <script>
  </script>

  <style>

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 275px;
        z-index: 996;
        transition: all 0.3s;
        padding: 20px;
        overflow-y: auto;
        scrollbar-width: thin;
        scrollbar-color: #08645c transparent;
        box-shadow: 0px 0px 20px rgba(1, 41, 112, 0.1);
        /* background-color: #5fc5bd; */
        background: linear-gradient(135deg, #ffc5bd 0%, #5fc5bd 100%);
        border-right: 1px solid #5fc5bd;
    }

    @media (max-width: 1199px) {
        .sidebar {
            left: -275px;
        }
    }

    .sidebar::-webkit-scrollbar {
        width: 5px;
        height: 8px;
        background-color: #fff;
    }

    .sidebar::-webkit-scrollbar-thumb {
        background-color: #aab7cf;
    }

    @media (min-width: 1200px) {
        #main,
        #footer {
            margin-left: 275px;
        }

        .toggle-sidebar-btn.sidebar-btn {
            display: none;
        }
    }

    @media (max-width: 1199px) {
        .toggle-sidebar .sidebar {
            left: 0;
        }
    }

    @media (min-width: 1200px) {
        .toggle-sidebar #main,
        .toggle-sidebar #footer {
            margin-left: 0;
        }

        .toggle-sidebar .sidebar {
            left: -275px;
        }
    }

    .toggle-sidebar-btn.sidebar-btn {
        font-size: 24px;
    }

    .sidebar-nav {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .sidebar-nav li {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .sidebar-nav .nav-item {
        margin-bottom: 5px;
    }

    .sidebar-nav .nav-heading {
        font-size: 11px;
        text-transform: uppercase;
        color: #040704;
        opacity: 0.75;
        font-weight: 600;
        margin: 14px 11px 5px 17px;
    }

    /* Tombol Dipencet */
    .sidebar-nav .nav-link {
        display: flex;
        align-items: center;
        font-size: 15px;
        font-weight: 600;
        color: #012970;
        transition: 0.3;
        /* background: #5fc5bd; */
        background: none !important;
        padding: 10px 15px;
        border-radius: 4px;
    }

    /* menu yang aktif */
    .sidebar-nav .nav-link.active {
        position: relative;
        color: #ffffff;
        /* background: #ffffff; */
        background: none;
        text-decoration: underline;
    }


    .sidebar-nav .nav-link.active,
    .sidebar-nav .nav-link.active.collapsed {
        color: #ffffff;
        /* background: #5fc5fd; */
        background: none;
    }


    #something .sidebar-nav .nav-link.active::after {
        content: "";
        display: block;
        width: 100%; /* Ubah ini sesuai dengan panjang garis yang diinginkan */
        border-bottom: 5px solid #000000; /* Ketebalan dan warna garis */
        position: absolute;
        bottom: -5px; /* Jarak antara teks dan garis */
        left: 20%; /* Tengah dari elemen teks */
        color: #ffffff;
    }

    .sidebar-nav .nav-item .nav-link,
    .sidebar-nav .nav-content .nav-link {
        position: relative;
    }


    .sidebar-nav .nav-link i {
        font-size: 16px;
        margin-right: 10px;
        color: #000000;
    }

    .sidebar-nav .nav-link.collapsed {
        color: #012970;
        /* background: #5fc5bd; */
        background: none;
    }

    /* kotak turun */
    .sidebar-nav .nav-link.collapsed i {
        color: #000000;
    }

    /* mouse geser */
    .sidebar-nav .nav-link:hover {
        color: var(--bs-secondary);
        /* background: #5fc5bd; */
    }

    .sidebar-nav .nav-link:hover i {
        color: #ffffff;
    }

    .sidebar-nav .nav-link .bi-chevron-down {
        margin-right: 0;
        transition: transform 0.2s ease-in-out;
    }

    .sidebar-nav .nav-link:not(.collapsed) .bi-chevron-down {
        transform: rotate(180deg);
    }


    /* Warna Navigasi collapse */

    .nav-content {
        /* background-color: #8abbb7; /* Background putih untuk konten collapse */ */
        background: none;
    }

    .nav-content .nav-link {
        color: #000; /* Warna teks hitam */
    }

    .nav-content .nav-link:hover {
        /* background-color: #5fc5bd; /* Background abu-abu muda saat hover */ */
    }


    .sidebar-nav .nav-content {
        padding: 5px 0 0 0;
        margin: 0;
        list-style: none;
    }

    .sidebar-nav .nav-content a {
        display: flex;
        align-items: center;
        font-size: 14px;
        font-weight: 600;
        color: #012970;
        background: none;
        transition: 0.3;
        padding: 10px 0 10px 40px;
        transition: 0.3s;
    }

    .sidebar-nav .nav-content a i {
        font-size: 6px;
        margin-right: 8px;
        line-height: 0;
        border-radius: 50%;
    }

    .sidebar-nav .nav-content a:hover,
    .sidebar-nav .nav-content a.active {
        color: #ffffff;
    }

    .sidebar-nav .nav-content a.active i {
        background-color: #4154f1;
    }

  </style>
