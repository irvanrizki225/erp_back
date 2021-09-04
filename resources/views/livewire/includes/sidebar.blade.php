<div class="sidebar-content">
    <!-- Side Header -->
    <div class="content-header content-header-fullrow px-15">
        <!-- Mini Mode -->
        <div class="content-header-section sidebar-mini-visible-b">
            <!-- Logo -->
            <span class="content-header-item font-w700 font-size-xl float-left animated fadeIn">
                <span class="text-dual-primary-dark">c</span><span class="text-primary">b</span>
            </span>
            <!-- END Logo -->
        </div>
        <!-- END Mini Mode -->

        <!-- Normal Mode -->
        <div class="content-header-section text-center align-parent sidebar-mini-hidden">
            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-circle btn-dual-secondary d-lg-none align-v-r" data-toggle="layout" data-action="sidebar_close">
                <i class="fa fa-times text-danger"></i>
            </button>
            <!-- END Close Sidebar -->

            <!-- Logo -->
            <div class="content-header-item">
                <a class="link-effect font-w700" href="/">
                    <span class="font-size-xl text-dual-primary-dark">Van</span><span class="font-size-xl text-primary">Riz ERP V1</span>
                </a>
            </div>
            <!-- END Logo -->
        </div>
        <!-- END Normal Mode -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side User -->
        <div class="content-side content-side-full content-side-user px-10 align-parent">
            <!-- Visible only in mini mode -->
            <div class="sidebar-mini-visible-b align-v animated fadeIn">
                <img class="img-avatar img-avatar32" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
            </div>
            <!-- END Visible only in mini mode -->

            <!-- Visible only in normal mode -->
            <div class="sidebar-mini-hidden-b text-center">
                <a class="img-link" href="javascript:void(0)">
                    <img class="img-avatar" src="{{ asset('media/avatars/avatar15.jpg') }}" alt="">
                </a>
                <ul class="list-inline mt-10">
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark font-size-sm font-w600 text-uppercase" href="javascript:void(0)">J. Smith</a>
                    </li>
                    <li class="list-inline-item">
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="link-effect text-dual-primary-dark" data-toggle="layout" data-action="sidebar_style_inverse_toggle" href="javascript:void(0)">
                            <i class="si si-drop"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="link-effect text-dual-primary-dark" href="{{route('logout')}}">
                            <i class="si si-logout"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- END Visible only in normal mode -->
        </div>
        <!-- END Side User -->

        <!-- Side Navigation -->
        <div class="content-side content-side-full">
            <ul class="nav-main">
                <li>
                    <a class="{{ request()->is('dashboard') ? ' active' : '' }}" href="/">
                        <i class="fa fa-home"></i><span class="sidebar-mini-hide">Dashboard</span>
                    </a>
                </li>
                <li class="nav-main-heading">
                    <span class="sidebar-mini-visible">WR</span><span class="sidebar-mini-hidden">Ware House</span>
                </li>
                <li class="{{ request()->is('pages/*') ? ' open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-reorder"></i><span class="sidebar-mini-hide">Barang</span></a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('pages/datatables') ? ' active' : '' }}" href="{{route('barang')}}">barang</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('pages/*') ? ' open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-reorder"></i><span class="sidebar-mini-hide">Purchase Order</span></a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('pages/datatables') ? ' active' : '' }}" href="{{route('po')}}">Purchase Order</a>
                        </li>
                    </ul>
                </li>
                <li class="{{ request()->is('pages/*') ? ' open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-reorder"></i><span class="sidebar-mini-hide">Penerimaan Barang</span></a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('pages/datatables') ? ' active' : '' }}" href="{{route('penerimaan_barang')}}">Penerimaan Barang</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-heading">
                    <span class="sidebar-mini-visible">KR</span><span class="sidebar-mini-hidden">Karyawan</span>
                </li>
                <li class="{{ request()->is('pages/*') ? ' open' : '' }}">
                    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="fa fa-user-o"></i><span class="sidebar-mini-hide">Karyawan</span></a>
                    <ul>
                        <li>
                            <a class="{{ request()->is('pages/datatables') ? ' active' : '' }}" href="{{route('departemen')}}">Departemen</a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a class="{{ request()->is('pages/datatables') ? ' active' : '' }}" href="{{route('karyawan')}}">Karyawan</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-main-heading">
                    <span class="sidebar-mini-visible">MR</span><span class="sidebar-mini-hidden">More</span>
                </li>
                <li>
                    <a href="/">
                        <i class="fa fa-reorder"></i><span class="sidebar-mini-hide">Landing</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</div>