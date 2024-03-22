<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <!-- LOGO -->
    <div class="navbar-brand-box">
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/favicon.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-master.png') }}" alt="" height="50">
            </span>
        </a>

        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('assets/images/favicon.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('assets/images/logo-master.png') }}" alt="" height="30">
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
                <li>
                    <a href="/">
                        <i class="uil-home-alt"></i><span class="badge rounded-pill bg-primary float-end">01</span>
                        <span>{{ __('Sidebar.dashboard') }}</span>
                    </a>
                </li>

                <li class="menu-title">{{ __('Sidebar.organizational_structure') }}</li>

                <li>
                    <a href="{{ route('user.index') }}" class="waves-effect">
                        <i class="uil-user"></i>
                        <span>{{ __('Sidebar.list_user') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('department.list') }}" class="waves-effect">
                        <i class="uil-sitemap"></i>
                        <span>{{ __('Sidebar.list_department') }}</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('position.list') }}" class="waves-effect">
                        <i class="uil-location-arrow"></i>
                        <span>{{ __('Sidebar.list_position') }}</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="uil-server-alt"></i>
                        <span>{{ __('Sidebar.role_manage') }}</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="uil-question-circle"></i>
                        <span>{{ __('Sidebar.permision_manage') }}</span>
                    </a>
                </li>

                <li class="menu-title">{{ __('Sidebar.document') }}</li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="uil-folder"></i>
                        <span>{{ __('Sidebar.list_document') }}</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="uil-folder-lock"></i>
                        <span>{{ __('Sidebar.document_by_department') }}</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
