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
            <ul class="navbar-nav mr-lg-2">
            <li class="nav-item nav-search d-none d-lg-block">
                <div class="input-group">
                <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                    <span class="input-group-text" id="search">
                    <i onclick="search()" class="icon-search"></i>
                    </span>
                </div>
                <input type="text" class="form-control" id="navbar-search-input" placeholder="rechercher" aria-label="search" aria-describedby="search">
                </div>
            </li>
            </ul>
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
                    <a class="nav-link" data-toggle="collapse" href="#niveau" aria-expanded="false" aria-controls="niveau">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Gérer les niveaux</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="niveau">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/creationniveauform">creer un niveau</a></li>
                            <li class="nav-item"><a class="nav-link" href="/listeniveaux">liste de niveaux</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#annee" aria-expanded="false" aria-controls="niveau">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Gérer les annee universitaire</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="annee">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/creationanneeuniversitaireform">creer une annee universitaire</a></li>
                            <li class="nav-item"><a class="nav-link" href="/listeanneeuniversitaire">liste d'annee universitaire</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#mention" aria-expanded="false" aria-controls="mention">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Gérer les mentions</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="mention">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/listemention">liste des mentions</a></li>
                            <li class="nav-item"><a class="nav-link" href="/creationmentionform">Ajouter un mention</a></li>
                            @if(!empty($menumention))
                                @foreach ($menumention as $mention)
                                    <li class="nav-item"><a class="nav-link" href="/listeetudiantparmention/{{$mention -> id}}">liste des etudiant par {{$mention -> mention}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#parcours" aria-expanded="false" aria-controls="parcours">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Gérer les parcours</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="parcours">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/listeparcour">liste des parcours</a></li>
                            <li class="nav-item"><a class="nav-link" href="/creationparcourform">Ajouter un parcour</a></li>
                            @if(!empty($menumention))
                                @foreach ($menuparcour as $parcour)
                                    <li class="nav-item"><a class="nav-link" href="/listeetudiantparparcour/{{$parcour -> id}}">liste des etudiant par {{$parcour -> parcour}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#tarif" aria-expanded="false" aria-controls="tarif">
                        <i class="icon-layout menu-icon"></i>
                        <span class="menu-title">Gérer les tarifs</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="tarif">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/listetarif">liste des tarifs</a></li>
                            <li class="nav-item"><a class="nav-link" href="/creationtarifform">Ajouter un tarif</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#etudiants" aria-expanded="false"
                       aria-controls="etudiants">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Gérer les etudiants</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="etudiants">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="/show_all_students">liste des &eacute;tudiants</a></li>
                            <li class="nav-item"><a class="nav-link" href="/add_new_students">Ajouter un &eacute;tudiant</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#classe" aria-expanded="false"
                       aria-controls="classe">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Gérer les classes</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="classe">
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
                       aria-controls="form-element">
                        <i class="icon-columns menu-icon"></i>
                        <span class="menu-title">Gérer les types de cours</span>
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
                </li> -->
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false"
                       aria-controls="charts">
                        <i class="icon-bar-graph menu-icon"></i>
                        <span class="menu-title">Gérer les ecolages</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="charts">
                        <ul class="nav flex-column sub-menu">
                            <!-- <li class="nav-item"><a class="nav-link" href="/ecolage_student_detail">Vérification écolage</a></li> -->
{{--                            <li class="nav-item"><a class="nav-link" href="/add_new_ecolage">Confirmer le--}}
{{--                                    paiement d' écolage</a></li>--}}
                            <!-- <li class="nav-item"><a class="nav-link" href="/history_ecolage">Afficher l'historique des écolages</a></li> -->
                            <li class="nav-item"><a class="nav-link" href="/attribuertarif/no_id">attribuer ecolage a un etudiant</a></li>
                            <li class="nav-item"><a class="nav-link" href="/attribuertarifavancer/no_id">attribuer ecolage a un etudiant (avance)</a></li>
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
        @yield('content_creationmention')
        @yield('content')

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
<script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<!-- End plugin js for this page input -->
<!-- Custom js for this page input-->
<script src="{{ asset('js/file-upload.js') }}"></script>
<script src="{{ asset('js/typeahead.js') }}"></script>
<script src="{{ asset('js/select2.js') }}"></script>
<!-- End custom js for this page input-->
<script src="{{ asset('js/customs/main.js') }}"></script>
<script src="{{ asset('js/chart.js') }}"></script>
<script src="{{ asset('js/popup.js') }}"></script>
<script src="{{ asset('js/search.js') }}"></script>

</body>

</html>
