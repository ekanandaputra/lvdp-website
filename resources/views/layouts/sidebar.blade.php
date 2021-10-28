<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">LVDP</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ request()->is('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('table') ? 'active' : '' }}">
        <a class="nav-link" href="/table">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Tabel</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('chart') ? 'active' : '' }}">
        <a class="nav-link" href="/chart">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Grafik</span>
        </a>
    </li>
</ul>