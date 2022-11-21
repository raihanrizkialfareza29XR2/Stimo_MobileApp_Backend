<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-toolbox"></i>
        </div>
       <a href="{{ route('dashboard') }}"><div class="text-center mb-3" style="color: white">Admin</div></a>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item {{ Request::is('publikasi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('publikasi.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Publikasi</span></a>
    </li>
    <li class="nav-item {{ Request::is('grafik*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('grafik.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Grafik</span></a>
    </li>
    <li class="nav-item {{ Request::is('indikator*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('indikator.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Indikator Strategis</span></a>
    </li>
    <li class="nav-item {{ Request::is('berita*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('berita.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>BRS</span></a>
    </li>
    <li class="nav-item {{ Request::is('infografis*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('infografis.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Infografis</span></a>
    </li>
    <li class="nav-item {{ Request::is('tabel*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('tabel.index') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tabel</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>