@extends('layouts.layout')

@section('content_show_all_students')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">liste de parcours</h4>
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
                                <table id="table" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            Nom
                                        </th>
                                        <th>
                                            Prenoms
                                        </th>
                                        <th>
                                            Classe
                                        </th>
                                        <th>
                                            Type de cours
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        foreach parcous  <!-- boucle donne anaty service  -->

                                    <tr>
                                        <td>
                                            atrib1
                                        </td>
                                        <td>
                                            atrib2
                                        </td>
                                        <td>
                                            atrib3
                                        </td>
                                        <td>
                                            atrib4
                                        </td>
                                        <td>
                                            <a href="/student_details/all_students_id}}">
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-info btn-fw"
                                                    data-mdb-ripple-color="dark"
                                                >
                                                    afficher  plus
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
{{--                                    <!-- {{$cnt++}} -->--}}
                                    endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial -->
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
    </div>
    <!-- page-body-wrapper ends -->

@endsection
