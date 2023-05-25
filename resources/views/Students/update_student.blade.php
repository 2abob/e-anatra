@extends('layouts.layout')

@section('content_update_students')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Modifier les donnees d'un etudiant</h4>
                            <p class="card-description">
                                Corriger les champs ci-dessous pour Modifier un étudiant
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
                            <form class="forms-sample" method="post" action="{{ route('update_student.store',$student ->id)}}" enctype="multipart/form-data">
                                <!-- CROSS Site Request Forgery Protection -->
                                @csrf
                                <div class="form-group">
                                    <label>Photo</label>
                                    <img style="width: 200px; height: 200px;" src="{{ asset("myfiles/$student->image") }}" height="75" width="75" alt="" />
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
                                    <input name="nom_etudiant" type="text" class="form-control" id="nom_etudiant" placeholder="Nom" required autofocus value="{{$student->nom_etudiant}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Prénoms</label>
                                    <input name="prenoms_etudiant" type="text" class="form-control" id="prenom" placeholder="Prenoms" required value="{{$student->prenoms_etudiant}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Date de naissance</label>
                                    <input name="date_de_naissance" type="date" class="form-control" id="date_naissance"
                                           required value="{{$student->date_de_naissance}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nom du pere</label>
                                    <input name="nom_du_pere" type="text" class="form-control" id="exampleInputEmail3" placeholder="Nom du pere" required value="{{$student->nom_du_pere}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nom de la mere</label>
                                    <input name="nom_de_la_mere" type="text" class="form-control" id="exampleInputEmail3" placeholder="Nom de la mere" required value="{{$student->nom_de_la_mere}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Contact Parent</label>
                                    <input name="contact_parent" type="text" class="form-control" id="exampleInputEmail3" placeholder="Contact Parent" required value="{{$student->contact_parent}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectGender">Sexe</label>
                                    <select name="sexe" class="form-control" id="exampleSelectGender" required>
                                        @if($student->sexe == 'Homme')
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                            <option value="Autre">Autre</option>
                                        @endif
                                        @if($student->sexe == 'Femme')
                                            <option value="Femme">Femme</option>
                                            <option value="Homme">Homme</option>
                                            <option value="Autre">Autre</option>
                                        @endif
                                        @if($student->sexe == 'Autre')
                                            <option value="Autre">Autre</option>
                                            <option value="Homme">Homme</option>
                                            <option value="Femme">Femme</option>
                                        @endif
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Adresse</label>
                                    <input name="adresse" type="text" class="form-control" id="adresse" placeholder="Adresse" required value="{{$student->adresse}}">
                                </div>
                                <button type="submit" class="btn btn-primary mr-2">Modifier</button>
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
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> <a
                        href="" target="_blank">Cours Ny Fahombiazako</a></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
