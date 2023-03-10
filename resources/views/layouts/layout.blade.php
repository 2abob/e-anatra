<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/vertical-layout-light/style.css') }}">
    {{ asset('') }}
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/final3.png') }}"/>
    <!-- jquery dataTables -->
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">
    <!-- jquery dataTables -->
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="/dashboard"><img src="{{ asset('images/soratra1.png') }}"
                                                                           class="mr-2" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="/dashboard"><img src="{{ asset('images/final.png') }}"
                                                                           alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                        <img src="{{ asset('images/faces/admin.png') }}" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="ti-power-off text-primary"></i>
                            Se deconnecter
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div>
                    Light
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div>
                    Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="/dashboard">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Tableau de bord</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false"
                       aria-controls="ui-basic">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">G??rer les ??tudiants    </span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/show_all_students">Afficher tous les
                                    ??tudiants</a></li>
                            <li class="nav-item"><a class="nav-link" href="/add_new_students">Ajouter un nouvel
                                    ??tudiant</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false"
                       aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">G??rer les classes</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-elements">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/show_all_classroom">Afficher toutes les
                                    classes</a></li>
                            <li class="nav-item"><a class="nav-link" href="/add_new_classroom">Ajouter une classe</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#form-element" aria-expanded="false"
                       aria-controls="form-elements">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">G??rer les types de cours</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="form-element">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/show_all_type_cours">Afficher tous les types
                                    de cours</a></li>
                            <li class="nav-item"><a class="nav-link" href="/add_new_type_cours">Ajouter un type de
                                    cours</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false"
                       aria-controls="charts">
                        <i class="icon-bar-graph menu-icon"></i>
                        <span class="menu-title">G??rer les ecolages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/ecolage_student_detail">V??rification ??colage</a></li>
{{--                            <li class="nav-item"><a class="nav-link" href="/add_new_ecolage">Confirmer le--}}
{{--                                    paiement d' ??colage</a></li>--}}
                            <li class="nav-item"><a class="nav-link" href="/history_ecolage">Afficher
                                    l'historique des ??colages</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </nav>
        @yield('content_dashboard')
        @yield('content_show_all_students')
        @yield('content_show_all_type_cours')
        @yield('content_add_new_students')
        @yield('content_add_new_type_cours')
        @yield('content_add_new_classroom')
        @yield('content_show_all_classroom')
        @yield('content_show_student_order_classroom')
        @yield('content_show_student_order_type_cours')
        @yield('content_show_student_details')
        @yield('content_update_students')
        @yield('content_classroom_update')
        @yield('content_update_type_cours')
        @yield('content_add_new_ecolage')
        @yield('content_details_ecolage')
        @yield('content_history_ecolage')

        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
</div>
<!-- plugins:js -->
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
<script src="{{ asset('js/dataTables.select.min.js') }}"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('js/off-canvas.js') }}"></script>
<script src="{{ asset('js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('js/template.js') }}"></script>
<script src="{{ asset('js/settings.js') }}"></script>
<script src="{{ asset('js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/Chart.roundedBarCharts.js') }}"></script>
<!-- End custom js for this page-->
<!-- jquery dataTables js for this page-->
<script src="{{ asset('js/table.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<!-- jquery dataTables js for this page-->

<!-- Plugin js for this page input -->
<script src="{{ asset('../../vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('../../vendors/select2/select2.min.js') }}"></script>
<!-- End plugin js for this page input -->
<!-- Custom js for this page input-->
<script src="{{ asset('../../js/file-upload.js') }}"></script>
<script src="{{ asset('../../js/typeahead.js') }}"></script>
<script src="{{ asset('../../js/select2.js') }}"></script>
<!-- End custom js for this page input-->

<script src="{{ asset('js/customs/main.js') }}"></script>
</body>

</html>
