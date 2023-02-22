@extends('layouts.layout')

@section('content_add_new_ecolage')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Ecolage</h4>
                            <div class="table-responsive pt-3">
                                <table id="table" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>
                                            Nom
                                        </th>
                                        <th>
                                            Prenoms
                                        </th>
                                        <th>
                                            Classe
                                        </th>
                                        <th>
                                            Type de cours
                                        </th>
                                        <th>
                                            Plus
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($all_student as $all_students)  <!-- boucle donne anaty service  -->

                                    <tr>
                                        <td>
                                            {{$all_students -> nom}}
                                        </td>
                                        <td>
                                            {{$all_students -> prenoms}}
                                        </td>
                                        <td>
                                            {{$all_students -> nom_classe}}
                                        </td>
                                        <td>
                                            {{$all_students -> type_cours}}
                                        </td>
                                        <td>
                                            <a href="/details_ecolage/{{$all_students -> id}}">
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-info btn-fw"
                                                    data-mdb-ripple-color="dark"
                                                >
                                                    Details ecolage
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    {{--                                    <!-- {{$cnt++}} -->--}}
                                    @endforeach
                                    {{--                                            @php--}}
                                    {{--                                                break;--}}
                                    {{--                                            @endphp--}}
                                    </tbody>
                                </table>
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
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> <a href="" target="_blank">Cours Ny Fahombiazako</a></span>
            </div>
        </footer>
    </div>
    <!-- page-body-wrapper ends -->
@endsection
