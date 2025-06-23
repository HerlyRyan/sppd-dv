<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SI SURAT</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/logos/favicon.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    @livewireStyles
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!-- Sidebar Start -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <a href="/" class="text-nowrap logo-img">
                        <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" width="180" alt="" />
                    </a>
                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">Home</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('/') ? 'active' : '' }}" href="/"
                                aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        @if (Auth::user()->role == 'admin')
                            <li class="nav-small-cap">
                                <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                                <span class="hide-menu">Master</span>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('employees*') ? 'active' : '' }}"
                                    href="{{ route('employees.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Pegawai</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('positions*') ? 'active' : '' }}"
                                    href="{{ route('positions.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Jabatan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('functional-positions*') ? 'active' : '' }}"
                                    href="{{ route('functional-positions.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Jabatan Fungsional</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('grades*') ? 'active' : '' }}"
                                    href="{{ route('grades.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Golongan</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('agencies*') ? 'active' : '' }}"
                                    href="{{ route('agencies.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Instansi</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('surat*') ? 'active' : '' }}"
                                    href="{{ route('surat.index') }}" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">Buat Surat</span>
                                </a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link {{ Request::is('history*') ? 'active' : '' }}"
                                    href="/history-surat" aria-expanded="false">
                                    <span>
                                        <i class="ti ti-article"></i>
                                    </span>
                                    <span class="hide-menu">History Surat</span>
                                </a>
                            </li>
                        @endif
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">SPPD & LPJ</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('sppd*') ? 'active' : '' }}"
                                href="{{ route('sppd.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">SPPD</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link {{ Request::is('lpj-header*') ? 'active' : '' }}"
                                href="{{ route('lpj-header.index') }}" aria-expanded="false">
                                <span>
                                    <i class="ti ti-article"></i>
                                </span>
                                <span class="hide-menu">LPJ</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!--  Sidebar End -->
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <!--  Header Start -->
            <header class="app-header">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
                        <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                            <li class="nav-item dropdown">
                                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" alt=""
                                        width="35" height="35" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                                    aria-labelledby="drop2">
                                    <div class="message-body">
                                        <div class="d-flex align-items-center gap-2 dropdown-item">

                                            <p class="mb-0 fs-3">
                                                {{ Auth::user()->username }}
                                            </p>
                                        </div>

                                        <a href="{{ route('logout') }}"
                                            class="btn btn-outline-primary mx-3 mt-2 d-block">
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!--  Header End -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="{{ asset('assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/dist/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard.js"') }}></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('#multiple-select-field').select2({
            theme: "bootstrap-5",
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            closeOnSelect: false,
        });
    </script>
</body>

</html>
