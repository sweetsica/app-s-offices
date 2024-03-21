<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="20">
            </span>
        </a>

        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo-sm.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="20">
            </span>
        </a>
    </div>

    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
        <i class="fa fa-fw fa-bars"></i>
    </button>

    <div data-simplebar class="sidebar-menu-scroll">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title"{{ __('Files.Menu') }}></li>

                <li>
                    <a href="/">
                        <i class="uil-home-alt"></i><span class="badge rounded-pill bg-primary float-end">01</span>
                        <span>DashBoard</span>
                    </a>
                </li>

                <li class="menu-title">Cơ cấu tổ chức</li>

                <li>
                    <a href="{{ route('user.index') }}" class="waves-effect">
                        <i class="uil-user"></i>
                        <span>Danh sách nhân sự</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('department.list') }}" class="waves-effect">
                        <i class="uil-sitemap"></i>
                        <span>Danh sách phòng ban</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('position.list') }}" class="waves-effect">
                        <i class="uil-location-arrow"></i>
                        <span>Danh sách vị trí</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="uil-server-alt"></i>
                        <span>Quản lý role</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="uil-question-circle"></i>
                        <span>Quản lý permision</span>
                    </a>
                </li>

                <li class="menu-title">Tài liệu</li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="uil-folder"></i>
                        <span>Danh sách tài liệu</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="uil-folder-lock"></i>
                        <span>Thống kê tài liệu theo phòng ban</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
