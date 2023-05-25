
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