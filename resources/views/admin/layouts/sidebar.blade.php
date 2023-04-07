<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('settings.index') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>Setting</span></a>
            </li>
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('heroes.index') }}">
                    <i class="fas fa-fw fa-image"></i>
                    <span>Hero</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('about-us.index') }}">
                    <i class="fas fa-fw fa-user-alt"></i>
                    <span>Tentang Kami</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('features.index') }}">
                    <i class="fas fa-fw fa-list-alt"></i>
                    <span>Fitur</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Kategori Toko</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('careers.index') }}">
                    <i class="fas fa-fw fa-briefcase"></i>
                    <span>Karir</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">

        </ul>
