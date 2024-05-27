<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="">
            <a class="nav-link active" href="">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Pages</li>

        @foreach ($sidebarItems as $key => $item)
            <li class="nav-item">
                @if(isset($item['route']))
                    {{-- WARNA PERLU DIBENARKAN AKU GAK NGERTI KUDU WARNA OPO --}}
                    <a class="nav-link text-primary" href="{{ route($item['route']) }}">
                        <i class="bi {{ $item['icon'] }}"></i><span>{{ $item['label'] }}
                    </a>
                @else
                    <a class="nav-link collapsed" data-bs-target="#{{ $key }}-nav" data-bs-toggle="collapse" href="#">
                        <i class="bi {{ $item['icon'] }}"></i><span>{{ $item['label'] }}</span><i class="bi bi-chevron-down ms-auto"></i>
                    </a>
                @endif
                <ul id="{{ $key }}-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    @foreach ($item['children'] as $child)
                        <li>
                            <a class="nav-link" href="{{ route($child['route']) }}">
                        <i class="bi {{ $child['icon'] }}"></i><span>{{ $child['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
  </aside><!-- End Sidebar-->
