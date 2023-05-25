@extends('layouts.layout')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ajouter un parcour</h4>
                            <p class="card-description">
                                Remplissez les champs ci-dessous pour ajouter un parcour
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
                            <form class="forms-sample"  method="post" action="{{ route('creationparcour') }}" enctype="multipart/form-data">
                                <!-- CROSS Site Request Forgery Protection -->
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">mention</label>
                                    <input name="idMention" onchange="popup('popupmention', 'idMention')" onclick="popup('popupmention', 'idMention')" type="text" class="form-control" id="idMention" placeholder="mention" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">pracour</label>
                                    <input name="parcour" type="text" class="form-control" id="parcour" placeholder="parcour" required>
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
