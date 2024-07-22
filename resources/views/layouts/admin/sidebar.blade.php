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
                <div class="sidebar-toggler  x">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" >
                    <a href="{{route('admin.dashboard')}}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>


                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.people.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.people.index') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Individu</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.kades.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.kades.index') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Kepala Desa</span>
                    </a>
                </li>

                <li class="sidebar-item {{ request()->routeIs('admin.kades.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.kades.index') }}" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Kepala Desa</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Components</span>
                    </a>
                </li>
                <li class="sidebar-title">Forms &amp; Tables</li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-hexagon-fill"></i>
                        <span>Form Elements</span>
                    </a>

                </li>
                <li class="sidebar-title">Extra UI</li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-pentagon-fill"></i>
                        <span>Widgets</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-egg-fill"></i>
                        <span>Icons</span>
                    </a>

                    <ul class="submenu ">

                        <li class="submenu-item  ">
                            <a href="ui-icons-bootstrap-icons.html" class="submenu-link">Bootstrap Icons </a>

                        </li>

                        <li class="submenu-item  ">
                            <a href="ui-icons-fontawesome.html" class="submenu-link">Fontawesome</a>

                        </li>

                        <li class="submenu-item  ">
                            <a href="ui-icons-dripicons.html" class="submenu-link">Dripicons</a>
                        </li>
                    </ul>


                </li>

                <li class="sidebar-title">Pages</li>

                <li class="sidebar-item  ">
                    <a href="application-email.html" class='sidebar-link'>
                        <i class="bi bi-envelope-fill"></i>
                        <span>Email Application</span>
                    </a>


                </li>


            </ul>
        </div>
    </div>
</div>
