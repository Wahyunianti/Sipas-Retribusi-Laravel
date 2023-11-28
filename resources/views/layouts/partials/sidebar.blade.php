<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('dashboard') }}"><span>SIPas</span>  <i class="bi bi-currency-exchange"></i></a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-house-door-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @if(auth()->user()->isAdmin())

                <li class="sidebar-item {{ request()->routeIs('pengguna.*') ? 'active' : '' }}">
                    <a href="{{ route('pengguna.index') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Kelola Pengguna</span>
                    </a>
                </li>

                <li class="sidebar-title">Kelola Retribusi Pasar</li>

                <li class="sidebar-item {{ request()->routeIs('retribusis.*') ? 'active' : '' }}">
                    <a href="{{ route('retribusis.index') }}" class='sidebar-link'>
                        <i class="bi bi-calendar-month-fill"></i>
                        <span>Retribusi</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('pasar.*') ? 'active' : '' }}">
                    <a href="{{ route('pasar.index') }}" class='sidebar-link'>
                        <i class="bi bi-pci-card"></i>
                        <span>Pasar</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('bagian.*') ? 'active' : '' }}">
                    <a href="{{ route('bagian.index') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Bagian</span>
                    </a>
                </li>
                @endif
                <li class="sidebar-title">Tampil & Cetak</li>

                <li class="sidebar-item {{ request()->is('tampilretribusi*') ? 'active' : '' }}">
                    <a href="{{ route('tampilretribusi') }}" class='sidebar-link'>
                        <i class="bi bi-clipboard-data-fill"></i>
                        <span>Retribusi Pasar</span>
                    </a>
                </li>   

                <li class="sidebar-item {{ request()->is('cetak*') ? 'active' : '' }}">
                    <a href="{{ route('cetak') }}" class='sidebar-link'>
                        <i class="bi bi-printer-fill"></i>
                        <span>Laporan</span>
                    </a>
                </li>        
                
                <li class="sidebar-title">Keluar Aplikasi</li>
                <li class="sidebar-item">
                    <form method="POST" action="{{ route('logout') }}" id="logout">
                        @csrf
                    <a href="{{ route('logout') }}" class='sidebar-link'>
                        <i class="bi bi-door-closed-fill"></i>
                        <span>Logout</span>
                    </a>
                    </form>
                </li>  
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>