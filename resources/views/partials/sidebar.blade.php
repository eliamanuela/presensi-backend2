<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">AdminKit</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a class="sidebar-link" href="/home">
                    <i class="align-middle" data-feather="sliders"></i> <span
                        class="align-middle">Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item {{ request()->routeIs('report_index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('report_index') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span
                        class="align-middle">Report</span>
                </a>
            </li>

            <li class="sidebar-header">
                Akun
            </li>

            <li class="sidebar-item {{ request()->routeIs('profil_index') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('profil_index') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                </a>
            </li>
    </div>
</nav>
