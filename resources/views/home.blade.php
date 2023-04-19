@extends('layouts.layout')

@section('content_dashboard')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                                <h3 class="font-weight-bold">Bienvenue</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Doughnut chart</h4>
                                <canvas id="doughnutChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <p>{{$test[0]->Id}}</p>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card tale-bg">
                            <div class="card-people mt-auto">
                                <img src="images/dashboard/final3.png" alt="people">
                                <div class="weather-info">
                                    <div class="d-flex">
                                        <div class="ml-2">
                                            <h4 class="location font-weight-normal"> </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin transparent">
                        <div class="row">
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-tale">
                                   <div class="card-body">
                                       <a style="color: #f8fafc;" href="/show_all_students">   <p class="mb-4">Liste de tous les étudiants</p></a>
                                        <p class="fs-30 mb-2">{{$count_all_student}} étudiants aux totales</p>
                                        <!--                      <p>10.00% (30 days)</p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-dark-blue">
                                    <div class="card-body">
                                        <a style="color: #f8fafc;" href="/show_all_classroom"><p class="mb-4">Listes des classes</p> </a>
                                        <p class="fs-30 mb-2">{{$count_all_classroom}} classes aux totales</p>
                                        <!--                      <p>22.00% (30 days)</p>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                                <div class="card card-light-blue">
                                    <div class="card-body">
                                        <a style="color: #f8fafc;" href="/history_ecolage">   <p class="mb-4">Historique écolage</p></a>
                                        <p class="fs-30 mb-2">{{$count_all_ecolage}} paiements aux totales</p>
                                        <!--                      <p>2.00% (30 days)</p>-->
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 stretch-card transparent">
                                <div class="card card-light-danger">
                                    <div class="card-body">
                                        <a style="color: #f8fafc;" href="/add_new_type_cours">   <p class="mb-4">Ajouter un nouveau type de cours</p></a>
                                        <p class="fs-30 mb-2">{{$count_all_type_cours}} types de cours</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.  Application développer et maintenue par Cours Ny Fahombiazako</span>
                </div>
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> <a href="" target="_blank">Cours Ny Fahombiazako</a></span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
@endsection

