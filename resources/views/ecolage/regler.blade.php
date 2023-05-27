@extends('layouts.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">regler la tranche {{ $numTranche }} de l'ecolage {{ $idEcolage }}</h4>
                            <p class="card-description">
                                Remplissez les champs ci-dessous
                            </p>
                            @if(Session::has('success'))
                                <div class="row form-ro">
                                    <div class="col-md-12">
                                        <p class="text-success">
                                            {{Session::get('success')}}
                                        </p>
                                    </div>
                                </div>
                            @endif
                            @if(Session::has('error'))
                                <div class="row form-ro">
                                    <div class="col-md-12">
                                        <p class="text-danger">
                                            {{Session::get('error')}}
                                        </p>
                                    </div>
                                </div>
                            @endif
                            <form class="forms-sample"  method="post" action="{{ route('reglerecolage') }}" enctype="multipart/form-data">
                                <!-- CROSS Site Request Forgery Protection -->
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">a payer</label>
                                    <input type="text" class="form-control" id="nom" value="mention" disabled>
                                    <input name="idecolage" type="hidden" class="form-control" id="nom" value="{{$idEcolage -> id}}" disabled>
                                    <input name="tranche" type="hidden" class="form-control" id="nom" value="tranche{{ $numTranche }}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">paye</label>
                                    <input type="text" class="form-control" id="nom" value="mention" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">reste</label>
                                    <input type="text" class="form-control" id="nom" value="mention" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">le montant que l'etudiant souhaite payer</label>
                                    <input name="montant" type="number" class="form-control" id="nom" placeholder="mention" required autofocus>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                <a href="/dashboard" type="button" class="btn btn-light">annuler</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2022.  Application développer et maintenue par Cours Ny Fahombiazako</span>
            </div>
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> <a href="" target="_blank">Cours Ny Fahombiazako</a></span>
            </div>
        </footer>
    </div>
        <!-- partial -->
@endsection
