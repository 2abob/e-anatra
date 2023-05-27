<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\Student;
use App\Models\EcolageEtudiant;
use Illuminate\Http\Request;
use App\Models\Parcour;
use App\Models\Mention;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    private $menumention, $menuparcour;

    public function __construct()
    {
        $this->middleware('auth');
        $this->menumention = Mention::all();
        $this->menuparcour = Parcour::all();
    }

    public function show_all_students()
    {
//        $all_student = student::all();
//        $users = DB::table('users')
//            ->join('contacts', 'users.id', '=', 'contacts.user_id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('users.*', 'contacts.phone', 'orders.price')
//            ->get();

        // $all_student = student::join('classes', 'students.id_classe', '=', 'classes.id')
        //     ->join('type_cours', 'students.id_type_cours', '=', 'type_cours.id')
        //     ->select('students.*', 'classes.nom_classe', 'type_cours.type_cours')
        //     ->get();

        $all_student = student::all();

//        $newestim = estimation::where('point',)->join("users", "users.id", "=", "estimations.iduser")->join("realities", "realities.date", "=", "estimations.dateestim")->get();
        return view('Students.show_all_students', ['all_student' => $all_student, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function popupetudiant()
    {
        $all_student = student::all();
        return view('Students.popup', compact('all_student'));
    }

    public function show_student_details($id_student)
    {
        $student_details = student::whereId($id_student)->first();
        $ecolages = EcolageEtudiant::where('idEtudiant', $id_student);
//        dd($student_details->created_at);
//        $student_details_join = student::join('classes',$student_details->id_classe,'=','classes.id')->get();

        return view('Students.show_student_details', ['student_details' => $student_details, 'ecolages' => $ecolages, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function add_new_students()
    {
        $all_classroom = classe::all();
        $all_type_cour = type_cours::all();
        return view('Students.add_new_students', ['menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    // Store Contact Form data
    public function add_new_studentsForm(Request $request)
    {
        try{
            //dd($request->all());
            // Form validation
            $this->validate($request, [
                // 'id_classe' => 'required',
                // 'id_type_cours' => 'required',
                // 'matricule' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'nom_etudiant' => 'required',
                'prenoms_etudiant' => 'required',
                'date_de_naissance' => 'required',
                'nom_du_pere' => 'required',
                'nom_de_la_mere' => 'required',
                'contact_parent' => 'required',
                'sexe' => 'required',
                'adresse' => 'required',
            ]);
            //Store data in database
            $data = Student::create($request->all());
            //upload image
            if ($request->file('image')) {
                $path = $request->file('image')->store('public/images',['disk' => 'my_files']);
                $data->image = $path;
                $data->save();
            }
            return back()->with('success', "L'etudiant est enregistrer.");
        }
        catch (\Exception $e) {
            // return back()->with('success', $e->getMessage().'');
            return back()->with('error', $e->getMessage().'');
            // return back()->with('error', $e);
            // echo "Erreur : ".$e->getMessage().'<br>';
            // var_dump($e);
        }
    }

    public function delete_student($id_student)
    {
        student::where('id', $id_student)->delete();
        return redirect('/show_all_students')->with('success', "L'etudiant a bien ete supprimer.");
    }

    public function update_student($id_student)
    {
        $all_classroom = classe::all();
        $all_type_cour = type_cours::all();

        $student = student::whereId($id_student)->first();
//        $student = student::where('id',$id_student)->first();
        return view('Students.update_student', ['student' => $student, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function update_studentForm(Request $request, $id_student)
    {
        try{
            $validatedData = $request->validate([
                // 'id_classe' => 'required',
                // 'id_type_cours' => 'required',
                // 'matricule' => 'required',
                'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'nom_etudiant' => 'required',
                'prenoms_etudiant' => 'required',
                'date_de_naissance' => 'required',
                'nom_du_pere' => 'required',
                'nom_de_la_mere' => 'required',
                'contact_parent' => 'required',
                'sexe' => 'required',
                'adresse' => 'required',
            ]);

            if ($request->file('image')) {
                $path = $request->file('image')->store('public/images',['disk' => 'my_files']);
                $validatedData['image'] = $path;
    //            $data->save();
            }
            student::whereId($id_student)->update($validatedData);

//        $post = student::find($id_student);
//        if($request->hasFile('image')){
//            $path = $request->file('image')->store('public/images');
//            $post->image = $path;
//        }

//        $this->validate($request, [
//            'id_classe' => 'required',
//            'id_type_cours' => 'required',
//            'matricule' => 'required',
//            'nom' => 'required',
//            'prenoms' => 'required',
//            'date_de_naissance' => 'required',
//            'nom_du_pere' => 'required',
//            'nom_de_la_mere' => 'required',
//            'contact_parent' => 'required',
//            'sexe' => 'required',
//            'adresse' => 'required',
//        ]);
//
//        student::whereId($id_student)->update($request->all());

            return redirect("/student_details/$id_student")->with('success', "L'etudiant a ete modifier.");
        }
        catch (\Exception $e) {
            // return back()->with('success', $e->getMessage().'');
            return redirect("/student_details/$id_student")->with('error', $e->getMessage().'');
            // return back()->with('error', $e);
            // echo "Erreur : ".$e->getMessage().'<br>';
            // var_dump($e);
        }

    }

    public function listeetudiantparmention($idMention)
    {
        try{
            $titre = "liste des etudiants pour la mention ".$idMention;
            $isEmpty  = DB::table('listeetudiantmention')->exists();
            $all_student = DB::table('listeetudiantmention')->where('idMention', $idMention);
            // var_dump($isEmpty);
            return view('Students.liste', ['isEmpty' => $isEmpty, 'titre' => $titre, 'all_student' => $all_student, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
        }
        catch (\Exception $e) {
            // return back()->with('success', $e->getMessage().'');
           echo $e->getMessage().'';
            // return back()->with('error', $e);
            // echo "Erreur : ".$e->getMessage().'<br>';
            // var_dump($e);
        }
    }

    public function listeetudiantparparcour($idParcour)
    {
        $titre = "liste des etudiants pour le parcour ".$idParcour;
        // var_dump($titre);
        $isEmpty  = DB::table('listeetudiantparcour')->exists();
        $all_student = DB::table('listeetudiantparcour')->where('idParcour', $idParcour);
        return view('Students.liste', ['isEmpty' => $isEmpty, 'titre' => $titre, 'all_student' => $all_student, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function resultatrecherche($key)
    {
        $results = DB::select(DB::raw('CALL rechercher(?)'), [$key]);
        return view('Students.resultat', ['key' => $key, 'results' => $results, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }
}
