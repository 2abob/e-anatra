@extends('layouts.layout')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Details du tarif</h4>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>id</th>
                                            <td>{{$tarif -> id}}</td>
                                        </tr>
                                        <tr>
                                            <th>id annee universitaire</th>
                                            <td>{{$tarif -> idAnnee}}</td>
                                        </tr>
                                        <tr>
                                            <th>id parcour</th>
                                            <td>{{$tarif -> idParcour}}</td>
                                        </tr>
                                        <tr>
                                            <th>id niveau</th>
                                            <td>{{$tarif -> idNiveau}}</td>
                                        </tr>
                                        <tr>
                                            <th>ecolage</th>
                                            <td>{{$tarif -> ecolage}}</td>
                                        </tr>
                                        <tr>
                                            <th>tranchhe 1</th>
                                            <td>{{$tarif -> tranche1}}</td>
                                        </tr>
                                        <tr>
                                            <th>tranche 2</th>
                                            <td>{{$tarif -> tranche2}}</td>
                                        </tr>
                                        <tr>
                                            <th>tranche 3</th>
                                            <td>{{$tarif -> tranche3}}</td>
                                        </tr>
                                        <tr>
                                            <th>tranche 4</th>
                                            <td>{{$tarif -> tranche4}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="/modifiertarifform/{{$tarif -> id}}" class="btn btn-primary btn-md">Modifier</a>
                                <a href="/supprimertarif/{{$tarif -> id}}" class="btn btn-danger btn-md">Supprimer</a>

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
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> <a
                        href="" target="_blank">Cours Ny Fahombiazako</a></span>
            </div>
        </footer>
    </div>
    <!-- page-body-wrapper ends -->

@endsection
