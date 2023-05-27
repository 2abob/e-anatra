@extends('layouts.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">attribuer un tarif pour un etudiant</h4>
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
                            <form class="forms-sample"  method="post" action="{{ route('attribuertarifconfirmation') }}" enctype="multipart/form-data">
                                <!-- CROSS Site Request Forgery Protection -->
                                @csrf
                                @if($idEtudiant == 'no_id')
                                <div class="form-group">
                                    <label for="exampleInputName1">etudiant</label>
                                    <input name="idEtudiant" onclick="popup('/popupetudiant', 'idEtudiant')" type="text" class="form-control" id="idEtudiant" placeholder="etudiant" required>
                                </div>
                                @else
                                <div class="form-group">
                                    <label for="exampleInputName1">etudiant</label>
                                    <input name="idEtudiant" onclick="popup('/popupetudiant', 'idEtudiant')" type="text" class="form-control" id="idEtudiant" placeholder="etudiant" required value="{{$idEtudiant}}">
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputName1">tarif</label>
                                    <input name="idTarif" onclick="popup('/popuptarif', 'idTarif')" type="text" class="form-control" id="idTarif" placeholder="tarif" required>
                                    <input name="tranche1" type="hidden" value="0" class="form-control" required>
                                    <input name="tranche2" type="hidden" value="0" class="form-control" required>
                                    <input name="tranche3" type="hidden" value="0" class="form-control" required>
                                    <input name="tranche4" type="hidden" value="0" class="form-control" required>
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
