@extends('layouts.layout')

@section('content_update_type_cours')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ajout type de cours</h4>
                            <p class="card-description">
                                Ajouter un type de cours
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
                            <form class="forms-sample" method="post" action="{{ route('add_new_type_cours.store') }}">
                                <!-- CROSS Site Request Forgery Protection -->
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputName1">Nom du type de cours</label>
                                    <input type="text" class="form-control" placeholder="Nom type de cours" name="type_cours" id="type_cours" required>
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Enregister</button>
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
