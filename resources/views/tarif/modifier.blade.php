@extends('layouts.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modifier tarif</h4>
                            <p class="card-description">
                                Modification du tarif {{$tarif -> id}}
                            </p>
                            @if(Session::has('success'))
                                <div class="row form-ro">
                                    <div class="col-md-12">
                                        <p class="card-description">
                                            {{Session::get('success')}}
                                        </p>
                                    </div>
                                </div>
                            @endif
                            <form class="forms-sample" method="post" action="{{ route('modifiertarif', $tarif -> id )}}">
                                <!-- CROSS Site Request Forgery Protection -->
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">annee universitaire</label>
                                    <input name="idAnnee" onclick="popup('popupanneeuniversitaire', 'idAnnee')" type="text" class="form-control" id="idAnnee" placeholder="annee universitaire" required autofocus value="{{$tarif -> idAnnee}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">parcour</label>
                                    <input name="idParcour" onclick="popup('popupparcour', 'idParcour')" type="text" class="form-control" id="idParcour" placeholder="parcour" required autofocus value="{{$tarif -> idParcour}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">niveau</label>
                                    <input name="idNiveau" onclick="popup('popupniveau', 'idNiveau')" type="text" class="form-control" id="idNiveau" placeholder="niveau" required autofocus value="{{$tarif -> idNiveau}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">ecolage</label>
                                    <input name="ecolage" type="number" class="form-control" id="ecolage" placeholder="montant ecolage" required autofocus value="{{$tarif -> exolage}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">tranche 1</label>
                                    <input name="tranche1" type="number" class="form-control" id="tranche1" placeholder="montant tranche 1" required autofocus value="{{$tarif -> tranche1}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">tranche 2</label>
                                    <input name="tranche2" type="number" class="form-control" id="tranche2" placeholder="montant tranche 2" required autofocus value="{{$tarif -> tranche2}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">tranche 3</label>
                                    <input name="tranche3" type="number" class="form-control" id="tranche3" placeholder="montant tranche 3" required autofocus value="{{$tarif -> tranche3}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">tranche 4</label>
                                    <input name="tranche4" type="number" class="form-control" id="tranche4" placeholder="montant tranche 4" required autofocus value="{{$tarif -> tranche4}}">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">modifier</button>
                                <a href="/fichetarif/{{$tarif -> id}}" type="button" class="btn btn-light">annuler</a>
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
        <!-- partial -->
    </div>
@endsection
