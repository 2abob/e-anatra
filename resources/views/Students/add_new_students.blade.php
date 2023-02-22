@extends('layouts.layout')

@section('content_add_new_students')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                     <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Ajouter un étudiant</h4>
                <p class="card-description">
                    Remplissez les champs ci-dessous pour ajouter un étudiant
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
                <form class="forms-sample"  method="post" action="{{ route('add_new_students.store') }}" enctype="multipart/form-data">
                    <!-- CROSS Site Request Forgery Protection -->
                    @csrf
                    <div class="form-group">
                        <label for="exampleSelectGender">Classe</label>
                        <select name="id_classe" class="form-control" id="id_classe" required onchange="autofillMatricule()">
                            <option value="">--Choisir la classe--</option>
                            @foreach ($all_classroom as $all_classrooms)
                                <option value="{{$all_classrooms -> id}}">{{$all_classrooms -> nom_classe}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Type de cours</label>
                        <select name="id_type_cours" class="form-control" id="id_type_cours" required onchange="autofillMatricule()">
                            <option value="">--Choisir le type de cours--</option>
                            @foreach ($all_type_cour as $all_type_cours)
                                <option value="{{$all_type_cours -> id}}">{{$all_type_cours -> type_cours}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Matricule</label>
                        <input name="matricule" type="text" class="form-control" id="matricule" placeholder="Matricule">
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Choisissez l'image">
                            <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">Nom</label>
                        <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Prénoms</label>
                        <input name="prenoms" type="text" class="form-control" id="prenom" placeholder="Prenoms" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword4">Date de naissance</label>
                        <input name="date_de_naissance" type="date" class="form-control" id="date_naissance" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nom du pere</label>
                        <input name="nom_du_pere" type="text" class="form-control" id="exampleInputEmail3" placeholder="Nom du pere" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Nom de la mere</label>
                        <input name="nom_de_la_mere" type="text" class="form-control" id="exampleInputEmail3" placeholder="Nom de la mere" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Contact Parent</label>
                        <input name="contact_parent" type="text" class="form-control" id="exampleInputEmail3" placeholder="Contact Parent" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Sexe</label>
                        <select name="sexe" class="form-control" id="exampleSelectGender" required>
                            <option value="Homme">Homme</option>
                            <option value="Femme">Femme</option>
                            <option value="Autre">Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCity1">Adresse</label>
                        <input name="adresse" type="text" class="form-control" id="adresse" placeholder="Adresse" required>
                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label for="exampleTextarea1">Information additionnel</label>--}}
{{--                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>--}}
{{--                    </div>--}}
                    <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
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
