<body class="">
    <!-- [ Pre-loader ] start -->
    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>
    <!-- [ Pre-loader ] End -->
    <!-- [ navigation menu ] start -->
    <nav class="pcoded-navbar  ">
        <div class="navbar-wrapper  ">
            <div class="navbar-content scroll-div ">

                <div class="">
                    <div class="main-menu-header">
                        <img class="img-radius" src="{{ asset('assets/images/user/user.png') }}"
                            alt="User-Profile-Image">
                        <div class="user-details">
                            <span>SIG Crime</span>
                            <div id="more-details">Kota Jember</div>
                        </div>
                    </div>
                </div>

                <ul class="nav pcoded-inner-navbar ">
                    <li class="nav-item pcoded-menu-caption">
                        <label>Navigasi</label>
                    </li>
                    <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                        <a href="{{ route('home') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                    </li>
                    </li>
                    <li class="nav-item {{ Request::is('admin/kecamatan', 'admin/kecamatan/*') ? 'active' : '' }}">
                        <a href="{{ route('kecamatan.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-map"></i></span><span class="pcoded-mtext">Kecamatan</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('admin/dataset', 'admin/dataset/*') ? 'active' : '' }}">
                        <a href="{{ route('dataset.index') }}" class="nav-link "><span class="pcoded-micon"><i
                                    class="feather icon-file-text"></i></span><span class="pcoded-mtext">Data
                                Set</span></a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
