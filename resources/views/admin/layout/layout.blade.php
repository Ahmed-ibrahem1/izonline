<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- ===== Favicon ===== -->
    <link rel="shortcut icon" href={{ asset('assets/images/logos/logo-square.png') }} type="image/x-icon">

    <title>{{ config('app.name') }} | Admin Panel</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome-all.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/nunito-font.css') }}"> --}}

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    @yield('head')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <img class="w-100" src="{{ asset('assets/images/logos/logo-white.png') }}" alt="white logo">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ \Request::route()->getName() === 'admin.dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>




            <div class="sidebar-heading">Courses</div>

            <x-admin.layout.sidebar-dropdown-item name=programs icon=fa-film />
            <x-admin.layout.sidebar-dropdown-item name=categories icon=fa-cubes />
            <x-admin.layout.sidebar-dropdown-item name=organisations icon=fa-building />


            <hr class="sidebar-divider">


            <div class="sidebar-heading">Instructors</div>

            <x-admin.layout.sidebar-dropdown-item name=instructors icon=fa-user-tie />

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Marketing</div>

            <x-admin.layout.sidebar-dropdown-item name=coupons icon=fa-ticket-alt />

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Sales</div>

            <x-admin.layout.sidebar-dropdown-item-view name=sales icon=fa-chart-bar />

            <hr class="sidebar-divider">

            <div class="sidebar-heading">Users</div>

            <x-admin.layout.sidebar-dropdown-item-view name=users icon=fa-user />

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        {{-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">{{ $requests->count() }}</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            @foreach ($requests->take(5) as $request)
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('users.manager-requests').'#'.$request->id }}">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">{{ $request->created_at->diffForHumans() }}</div>
                                    <span class="font-weight-bold">{{ $request->username }} has requested to become a manager.</span>
                                </div>
                            </a>
                            @endforeach
                            <a class="dropdown-item text-center small text-gray-500" href="{{ route('users.manager-requests') }}">Show All Alerts</a>
                        </div>
                        </li> --}}

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->username }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('assets/images/icon/admin-profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('admin.programs.index') }}">
                                    <i class="fas fa-user-tie fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Courses Overview
                                </a>
                                <a class="dropdown-item" href="{{ route('admin.users.index') }}">
                                    <i class="fas fa-users fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Users Overview
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ config('app.name') }} 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form id="logout_form" method="POST" action="{{ route('session.destroy') }}">
                        @csrf
                        <a class="btn btn-primary text-white" href="javascript:{}"
                            onclick="document.getElementById('logout_form').submit();">Logout</a>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    {{-- <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script> --}}
    <script src="{{ asset('assets/js/bootstrap.bundle.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/js/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>

    @yield('foot')
    @include('components.flash-message')
</body>

</html>
