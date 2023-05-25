@extends('layouts.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ajouter un tarif</h4>
                            <p class="card-description">
                                Remplissez les champs ci-dessous pour ajouter un tarif
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
                            <form class="forms-sample"  method="post" action="{{ route('creationtarif') }}" enctype="multipart/form-data">
                                <!-- CROSS Site Request Forgery Protection -->
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">annee universitaire</label>
                                    <input name="idAnnee" onclick="popup('popupanneeuniversitaire', 'idAnnee')" type="text" class="form-control" id="idAnnee" placeholder="annee universitaire" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">parcour</label>
                                    <input name="idParcour" onclick="popup('popupparcour', 'idParcour')" type="text" class="form-control" id="idParcour" placeholder="parcour" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">niveau</label>
                                    <input name="idNiveau" onclick="popup('popupniveau', 'idNiveau')" type="text" class="form-control" id="idNiveau" placeholder="niveau" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">ecolage</label>
                                    <input name="ecolage" type="number" class="form-control" id="ecolage" placeholder="montant ecolage" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">tranche 1</label>
                                    <input name="tranche1" type="number" class="form-control" id="tranche1" placeholder="montant tranche 1" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">tranche 2</label>
                                    <input name="tranche2" type="number" class="form-control" id="tranche2" placeholder="montant tranche 2" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">tranche 3</label>
                                    <input name="tranche3" type="number" class="form-control" id="tranche3" placeholder="montant tranche 3" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">tranche 4</label>
                                    <input name="tranche4" type="number" class="form-control" id="tranche4" placeholder="montant tranche 4" required autofocus>
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
