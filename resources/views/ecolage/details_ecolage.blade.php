@extends('layouts.layout')

@section('content_details_ecolage')

    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
{{--                <div class="col-md-6 grid-margin stretch-card">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h4 class="card-title">Listes des payements de l'etudiant</h4>--}}
{{--                                                        <p class="card-description">Add class <code>.list-ticked</code> to <code>&lt;ul&gt;</code></p>--}}
{{--                            <ul class="list-ticked">--}}
{{--                                @if(!$ecolage_student -> count())--}}
{{--                                    <li>L'etudiant n'a pas encore payer d'ecolage depuis son inscription</li>--}}
{{--                                @endif--}}
{{--                                @foreach($ecolage_student as $ecolage_students)--}}
{{--                                    <li>Mois, anne et date : {{$ecolage_students->mois}} / {{$ecolage_students->anne}}--}}
{{--                                        / {{$ecolage_students->created_at}}--}}
{{--                                                                                     <button type="button" class="btn btn-outline-info btn-fw">Info</button>--}}
{{--                                    </li>--}}

{{--                                                                            <li></li>--}}
{{--                                @endforeach--}}

{{--                                                                <li>Consectetur adipiscing elit</li>--}}
{{--                                                                <li>Integer molestie lorem at massa</li>--}}
{{--                                                                <li>Facilisis in pretium nisl aliquet</li>--}}
{{--                                                                <li>Nulla volutpat aliquam velit></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}



                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Listes des payements de l'etudiant</h4>
                            @if(Session::has('success'))
                                <div class="row form-ro">
                                    <div class="col-md-12">
                                        <p class="text-success">
                                            {{Session::get('success')}}
                                        </p>
                                    </div>
                                </div>
                            @endif
{{--                            <p class="card-description">--}}
{{--                                Add class <code>.table</code>--}}
{{--                            </p>--}}
                            <div class="table-responsive">
                                @if(!$ecolage_student -> count())
                                    <li>L'etudiant n'a pas encore payer d'ecolage depuis son inscription</li>
                                @else
                                <table class="table" id="table">
                                    <thead>
                                    <tr>
                                        <th>Mois</th>
                                        <th>Annee</th>
                                        <th>Date de payement</th>
                                        <th>Statut</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($ecolage_student as $ecolage_students)
                                    <tr>
                                        <td>{{$ecolage_students->mois}}</td>
                                        <td>{{$ecolage_students->anne}}</td>
                                        <td>{{$ecolage_students->created_at}}</td>
{{--                                        <td><label class="badge badge-danger">Pending</label></td>--}}
                                        <td><label class="badge badge-success">Payer</label></td>
                                    </tr>
                                    @endforeach
{{--                                    <tr>--}}
{{--                                        <td>Messsy</td>--}}
{{--                                        <td>53275532</td>--}}
{{--                                        <td>15 May 2017</td>--}}
{{--                                        <td><label class="badge badge-warning">In progress</label></td>--}}
{{--                                        <td><label class="badge badge-success">Payer</label></td>--}}

{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>John</td>--}}
{{--                                        <td>53275533</td>--}}
{{--                                        <td>14 May 2017</td>--}}
{{--                                        <td><label class="badge badge-info">Fixed</label></td>--}}
{{--                                        <td><label class="badge badge-success">Payer</label></td>--}}

{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Peter</td>--}}
{{--                                        <td>53275534</td>--}}
{{--                                        <td>16 May 2017</td>--}}
{{--                                        <td><label class="badge badge-success">Payer</label></td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>Dave</td>--}}
{{--                                        <td>53275535</td>--}}
{{--                                        <td>20 May 2017</td>--}}
{{--                                        <td><label class="badge badge-warning">In progress</label></td>--}}
{{--                                        <td><label class="badge badge-success">Payer</label></td>--}}

{{--                                    </tr>--}}
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Enregistrer un nouveau payement.</h4>
                            @if(!$ecolage_student -> count())
                                <p class="card-description">
                                    Etudiant : {{$all_student->nom}} {{$all_student->prenoms}}
                                </p>
                                <p class="card-description">
                                    Matricule : {{$all_student->matricule}}
                                </p>
                            @else
                                <p class="card-description">
                                        Etudiant : {{$ecolage_students->nom}} {{$ecolage_students->prenoms}}
                                </p>
                                <p class="card-description">
                                    Matricule : {{$ecolage_students->matricule}}
                                </p>
                            @endif

                            <form class="forms-sample"  method="post" action="{{ route('new_ecolage.store',$all_student->id)}}">
                                <!-- CROSS Site Request Forgery Protection -->
                                @csrf
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Mois</label>
                                    <div class="col-sm-9">
                                        <select name="mois" class="form-control form-control-lg" id="mois" required>
                                            <option value="">--choisir le mois--</option>
                                            <option value="janvier">janvier</option>
                                            <option value="février">février</option>
                                            <option value="mars">mars</option>
                                            <option value="avril">avril</option>
                                            <option value="mai">mai</option>
                                            <option value="juin">juin</option>
                                            <option value="juillet">juillet</option>
                                            <option value="août ">août</option>
                                            <option value="Septembre">Septembre</option>
                                            <option value="Octobre">Octobre</option>
                                            <option value="Novembre">Novembre</option>
                                            <option value="Décembre">Décembre</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Annee</label>
                                    <div class="col-sm-9">
                                        <select name="anne" class="form-control form-control-lg" id="anne"
                                                required>
                                            <option value="">--choisir l'annee--</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select></div>
                                </div>


                                <button type="submit" class="btn btn-primary mr-2">Enregistrer</button>
                                {{--                                <button class="btn btn-light">Annuler</button>--}}
                            </form>
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

@endsection
