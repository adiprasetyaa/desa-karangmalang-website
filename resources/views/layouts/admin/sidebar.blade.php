<div id="sidebar">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header position-relative">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo">
                    <a href="/">
                        <img src="{{ asset('assets/admin') }}/static/images/logo/logo.png" alt="Logo" srcset=""
                            style="width: 100px;height: auto;">
                    </a>
                </div>
                <div class="sidebar-toggler x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-speedometer2"></i> <!-- Icon untuk Dashboard -->
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">Informasi Desa</li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-info-circle-fill"></i> <!-- Icon untuk Profil Desa -->
                        <span>Profil Desa</span>
                    </a>

                    <ul class="submenu">
                        <li class="submenu-item {{ request()->routeIs('admin.tentang_kami.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.tentang_kami.index') }}" class="submenu-link">Tentang Kami</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.visimisi.index') }}" class="submenu-link">Visi &amp; Misi</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.geografis_desa.index') }}" class="submenu-link">Geografis Desa</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.demografi_desa.index') }}" class="submenu-link">Demografis Desa</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Pemerintahan</li>

                <li class="sidebar-item {{ request()->routeIs('admin.struktur_organisasi.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.struktur_organisasi.index') }}" class='sidebar-link'>
                        <i class="bi bi-diagram-3-fill"></i> <!-- Icon untuk Struktur Organisasi -->
                        <span>Struktur Organisasi</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.kades.view') ? 'active' : '' }}">
                    <a href="{{ route('admin.kades.view') }}" class='sidebar-link'>
                        <i class="bi bi-person-badge-fill"></i> <!-- Icon untuk Kepala Desa -->
                        <span>Kepala Desa</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.ketua_rt.view') ? 'active' : '' }}">
                    <a href="{{ route('admin.ketua_rt.view') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i> <!-- Icon untuk Ketua RT -->
                        <span>Ketua RT</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.perangkat_desa.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.perangkat_desa.index') }}" class='sidebar-link'>
                        <i class="bi bi-person-lines-fill"></i> <!-- Icon untuk Perangkat Desa -->
                        <span>Perangkat Desa</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-building"></i> <!-- Icon untuk Lembaga Desa -->
                        <span>Lembaga Desa</span>
                    </a>

                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('admin.bpd.view') }}" class="submenu-link {{ request()->routeIs('admin.bpd.view') ? 'active' : '' }}">BPD</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.bumdes.view') }}" class="submenu-link {{ request()->routeIs('admin.bumdes.view') ? 'active' : '' }}">BUMDES</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.linmas.view') }}" class="submenu-link {{ request()->routeIs('admin.linmas.view') ? 'active' : '' }}">Linmas</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.lkd.view') }}" class="submenu-link {{ request()->routeIs('admin.lkd.view') ? 'active' : '' }}">LKD</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.lpmd.view') }}" class="submenu-link {{ request()->routeIs('admin.lpmd.view') ? 'active' : '' }}">LPMD</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('admin.spmdes.view') }}" class="submenu-link {{ request()->routeIs('admin.spmdes.view') ? 'active' : '' }}">SPMDES</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-title">Informasi Desa</li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.post.index') }}" class="sidebar-link {{ request()->routeIs('admin.post.index') ? 'active' : '' }}">
                        <i class="bi bi-newspaper"></i> <!-- Icon untuk Postingan -->
                        <span>Postingan</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.layanan_publik.index') }}" class="sidebar-link {{ request()->routeIs('admin.layanan_publik.index') ? 'active' : '' }}">
                        <i class="bi bi-card-checklist"></i> <!-- Icon untuk Layanan Publik -->
                        <span>Layanan Publik</span>
                    </a>
                </li>

                <li class="sidebar-item has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-megaphone-fill"></i> <!-- Icon untuk Informasi Publik -->
                        <span>Informasi Publik</span>
                    </a>

                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="ui-icons-bootstrap-icons.html" class="submenu-link">Berita</a>
                        </li>
                        <li class="submenu-item">
                            <a href="ui-icons-fontawesome.html" class="submenu-link">Pengumuman</a>
                        </li>
                        <li class="submenu-item">
                            <a href="ui-icons-dripicons.html" class="submenu-link">Agenda Kegiatan</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a href="{{ route('admin.gallery.index') }}" class="sidebar-link {{ request()->routeIs('admin.gallery.index') ? 'active' : '' }}">
                        <i class="bi bi-images"></i> <!-- Icon untuk Galeri -->
                        <span>Galeri</span>
                    </a>
                </li>

                <li class="sidebar-title">Setting</li>

                <li class="sidebar-item">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" class="sidebar-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i> <!-- Icon untuk Logout -->
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
