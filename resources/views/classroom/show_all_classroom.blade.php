@extends('layouts.layout')

@section('content_show_all_classroom')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Tableau de bord</h4>
                            @if(Session::has('success'))
                                <div class="row form-ro">
                                    <div class="col-md-12">
                                        <p class="text-success">
                                            {{Session::get('success')}}
                                        </p>
                                    </div>
                                </div>
                            @endif
                            <div class="table-responsive pt-3">
                                <table id="table" class="table align-middle mb-0 bg-white">
                                    <thead class="bg-light">
                                    <tr>
                                        <th>Nom Classe</th>
                                        <th>Actions</th>
                                        <th>Modification</th>
                                        <th>Suppression</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($all_classroom as $all_classrooms)
                                    <tr>
                                        <td>
                                            <p class="fw-normal mb-1">{{$all_classrooms -> nom_classe}}</p>
                                        </td>
                                        <td>
                                            <a href="/show_student/{{$all_classrooms -> id}}">
                                            <button
                                                type="button"
                                                class="btn btn-outline-info btn-fw"
                                                data-mdb-ripple-color="dark"
                                            >
                                                Afficher les etudiants de cette classe
                                            </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/classroom_update/{{$all_classrooms -> id}}">
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-info btn-fw"
                                                    data-mdb-ripple-color="dark"
                                                >
                                                    Modifier la classe
                                                </button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/classroom_delete/{{$all_classrooms -> id}}">
                                                <button
                                                    type="button"
                                                    class="btn btn-danger"
                                                    data-mdb-ripple-color="dark"
                                                >
                                                    Supprimer la classe
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->

        </div>
        <!-- main-panel ends -->
        <!-- partial:../../partials/_footer.html -->
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
    <!-- page-body-wrapper ends -->

@endsection
