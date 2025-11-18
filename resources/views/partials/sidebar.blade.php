<div class="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-logo">
            <img src="{{ asset('assets/logo-website.png') }}" class="full-logo" alt="Logo MAN 2 Payakumbuh">
            <img src="{{ asset('assets/logo-side.png') }}" class="side-logo" alt="Logo MAN 2 Payakumbuh">
        </div>
    </div>

    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home"></i>
                    <span class="menu-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.manajemen-buku') }}" class="{{ request()->routeIs('admin.manajemen-buku') ? 'active' : '' }}">
                    <i class="fas fa-book-open"></i>
                    <span class="menu-text">Manajemen Buku</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('admin.manajemen-anggota') }}" class="{{ request()->routeIs('admin.manajemen-anggota') ? 'active' : '' }}">
                    <i class="fas fa-users"></i>
                    <span class="menu-text">Manajemen Anggota</span>
                </a>
            </li>
            <li>
                <a href="#" class="{{ request()->routeIs('admin.peminjaman') ? 'active' : '' }}">
                    <i class="fas fa-exchange-alt"></i>
                    <span class="menu-text">Peminjaman</span>
                </a>
            </li>
            <li>
                <a href="#" class="{{ request()->routeIs('admin.pengembalian') ? 'active' : '' }}">
                    <i class="fas fa-undo-alt"></i>
                    <span class="menu-text">Pengembalian</span>
                </a>
            </li> --}}
            <li>
                <a href="{{ route('admin.manajemen-admin') }}" class="{{ request()->routeIs('admin.manajemen-admin') ? 'active' : '' }}">
                    <i class="fas fa-user-shield"></i>
                    <span class="menu-text">Manajemen Admin</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.laporan') }}" class="{{ request()->routeIs('admin.laporan') ? 'active' : '' }}">
                    <i class="fas fa-chart-bar"></i>
                    <span class="menu-text">Laporan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.pengaturan') }}" class="{{ request()->routeIs('admin.pengaturan') ? 'active' : '' }}">
                    <i class="fas fa-cog"></i>
                    <span class="menu-text">Pengaturan</span>
                </a>
            </li>
        </ul>

        <div class="mobile-close">
            <button id="mobileCloseSidebar">
                <i class="fas fa-chevron-left"></i>
            </button>
        </div>
    </div>
</div>

<div class="toggle-sidebar">
    <i class="fas fa-chevron-left"></i>
</div>
