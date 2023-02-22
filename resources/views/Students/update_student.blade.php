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
{{--                                @method('PUT')--}}
                                <div class="form-group">
                                    <label for="exampleSelectGender">Classe</label>
                                    <select name="id_classe" class="form-control" id="id_classe" required
                                            onchange="autofillMatricule()">
                                        <option value="{{$student->id_classe}}">{{$student->nom_classe}}</option>
                                        @foreach ($all_classroom as $all_classrooms)
                                            @if($all_classrooms -> id != $student->id_classe)
                                                <option
                                                    value="{{$all_classrooms -> id}}">{{$all_classrooms -> nom_classe}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleSelectGender">Type de cours</label>
                                    <select name="id_type_cours" class="form-control" id="id_type_cours" required
                                            onchange="autofillMatricule()">
                                        <option value="{{$student->id_type_cours}}">{{$student->type_cours}}</option>
                                        @foreach ($all_type_cour as $all_type_cours)
                                            @if($all_type_cours -> id != $student->id_type_cours)
                                                <option
                                                    value="{{$all_type_cours -> id}}">{{$all_type_cours -> type_cours}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputName1">Matricule</label>
                                    <input name="matricule" type="text" class="form-control" id="matricule"
                                           placeholder="Matricule" value="{{$student->matricule}}">
                                </div>
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
                                    <input name="nom" type="text" class="form-control" id="nom" placeholder="Nom"
                                           required autofocus value="{{$student->nom}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Prénoms</label>
                                    <input name="prenoms" type="text" class="form-control" id="prenom"
                                           placeholder="Prenoms" required value="{{$student->prenoms}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword4">Date de naissance</label>
                                    <input name="date_de_naissance" type="date" class="form-control" id="date_naissance"
                                           required value="{{$student->date_de_naissance}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nom du pere</label>
                                    <input name="nom_du_pere" type="text" class="form-control" id="exampleInputEmail3"
                                           placeholder="Nom du pere" required value="{{$student->nom_du_pere}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Nom de la mere</label>
                                    <input name="nom_de_la_mere" type="text" class="form-control"
                                           id="exampleInputEmail3" placeholder="Nom de la mere" required
                                           value="{{$student->nom_de_la_mere}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail3">Contact Parent</label>
                                    <input name="contact_parent" type="text" class="form-control"
                                           id="exampleInputEmail3" placeholder="Contact Parent" required
                                           value="{{$student->contact_parent}}">
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
                                {{--                    <div class="form-group">--}}
                                {{--                        <label>Photo</label>--}}
                                {{--                        <input type="file" name="img[]" class="file-upload-default">--}}
                                {{--                        <div class="input-group col-xs-12">--}}
                                {{--                            <input type="text" class="form-control file-upload-info" disabled placeholder="Choisissez l'image">--}}
                                {{--                            <span class="input-group-append">--}}
                                {{--                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>--}}
                                {{--                        </span>--}}
                                {{--                        </div>--}}
                                {{--                    </div>--}}
                                <div class="form-group">
                                    <label for="exampleInputCity1">Adresse</label>
                                    <input name="adresse" type="text" class="form-control" id="adresse"
                                           placeholder="Adresse" required value="{{$student->adresse}}">
                                </div>
                                {{--                    <div class="form-group">--}}
                                {{--                        <label for="exampleTextarea1">Information additionnel</label>--}}
                                {{--                        <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>--}}
                                {{--                    </div>--}}
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
