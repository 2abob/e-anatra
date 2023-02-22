@extends('layouts.layout')

@section('content_show_student_details')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Details de l'etudiant</h4>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <tbody>
                                    {{--                                    <!-- {{$cnt=1}} --> @foreach ($all_student as $all_students)  <!-- boucle donne anaty service  -->--}}
                                    <tr>
                                        <th>Nom</th>
                                        <td>{{$student_details -> nom}}</td>
                                    </tr>
                                    <tr>
                                        <th>Prenoms</th>
                                        <td>{{$student_details -> prenoms}}</td>
                                    </tr>
                                    <tr>
                                        <th>Classe</th>
                                        <td>{{$student_details -> nom_classe}}</td>
                                    </tr>
                                    <tr>
                                        <th>Type de cours</th>
                                        <td>{{$student_details -> type_cours}}</td>
                                    </tr>
                                    <tr>
                                        <th>Matricule</th>
                                        <td>{{$student_details -> matricule}}</td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                       
                                        {{--    <td><img src="{{ Storage::url($student_details->image) }}" height="75" width="75" alt="" /></td>  --}}
                                                <td><img src="{{ asset("myfiles/$student_details->image") }}" height="75" width="75" alt="" /></td>

                                    </tr>
                                    <tr>
                                        <th>Date de naissance</th>
                                        <td>{{$student_details -> date_de_naissance}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nom du pere</th>
                                        <td>{{$student_details -> nom_du_pere}}</td>
                                    </tr>
                                    <tr>
                                        <th>Nom de la mere</th>
                                        <td>{{$student_details -> nom_de_la_mere}}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact parent</th>
                                        <td>{{$student_details -> contact_parent}}</td>
                                    </tr>
                                    <tr>
                                        <th>Sexe</th>
                                        <td>{{$student_details -> sexe}}</td>
                                    </tr>
                                    <tr>
                                        <th>Adresse</th>
                                        <td>{{$student_details -> adresse}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date de creation</th>
                                        <td>{{$student_details -> created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date de modification</th>
                                        <td>{{$student_details -> updated_at}}</td>
                                    </tr>
                                    {{--                                    <!-- {{$cnt++}} -->--}}
                                    {{--                                    @endforeach--}}
                                    </tbody>
                                </table>
                           <a href="/delete_student/{{$student_details -> id}}"><button style="margin-top: 26px;" class="btn btn-danger btn-md">Supprimer</button></a>
                             <a href="/update_student/{{$student_details -> id}}"><button style="margin-top: 26px;" class="btn btn-primary btn-md">Modifier</button></a>
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
