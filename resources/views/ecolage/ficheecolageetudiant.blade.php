@extends('layouts.layout')

@section('content')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    @if(Session::has('success'))
                    <div class="row form-ro">
                        <div class="col-md-12">
                            <p class="text-success">
                                {{Session::get('success')}}
                            </p>
                        </div>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Details sur le payement de l'ecolage {{$ecolage -> id}}</h4>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>numero tranche</th>
                                        <th>a payer</th>
                                        <th>payee</th>
                                        <th>reste a payer</th>
                                        <th>action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>{{$ecolage -> apaye1}}</td>
                                            <td>{{$ecolage -> paye1}}</td>
                                            <td>{{$ecolage -> rest1}}</td>
                                            @if(empty($maVariable))
                                            <td><a href="/reglerecolageform/{{$ecolage -> id}}/1" class="btn btn-outline-info btn-fw" data-mdb-ripple-color="dark">regler</a></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>{{$ecolage -> apaye2}}</td>
                                            <td>{{$ecolage -> paye2}}</td>
                                            <td>{{$ecolage -> rest2}}</td>
                                            @if(empty($maVariable))
                                            <td><a href="/reglerecolageform/{{$ecolage -> id}}/2" class="btn btn-outline-info btn-fw" data-mdb-ripple-color="dark">regler</a></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>{{$ecolage -> apaye3}}</td>
                                            <td>{{$ecolage -> paye3}}</td>
                                            <td>{{$ecolage -> rest3}}</td>
                                            @if(empty($maVariable))
                                            <td><a href="/reglerecolageform/{{$ecolage -> id}}/3" class="btn btn-outline-info btn-fw" data-mdb-ripple-color="dark">regler</a></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>{{$ecolage -> apaye4}}</td>
                                            <td>{{$ecolage -> paye4}}</td>
                                            <td>{{$ecolage -> rest4}}</td>
                                            @if(empty($maVariable))
                                            <td><a href="/reglerecolageform/{{$ecolage -> id}}/4" class="btn btn-outline-info btn-fw" data-mdb-ripple-color="dark">regler</a></td>
                                            @endif
                                        </tr>
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
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> <a
                        href="" target="_blank">Cours Ny Fahombiazako</a></span>
            </div>
        </footer>
    </div>
    <!-- page-body-wrapper ends -->

@endsection
