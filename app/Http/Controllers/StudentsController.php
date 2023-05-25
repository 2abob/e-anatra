<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\Student;
use App\Models\type_cours;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
        return view('Students.show_all_students', compact('all_student'));
    }

    public function show_student_details($id_student)
    {
        $student_details = student::whereId($id_student)->first();
//        dd($student_details->created_at);
//        $student_details_join = student::join('classes',$student_details->id_classe,'=','classes.id')->get();

        return view('Students.show_student_details', compact('student_details'));
    }

    public function add_new_students()
    {
        $all_classroom = classe::all();
        $all_type_cour = type_cours::all();
        return view('Students.add_new_students', compact('all_classroom', 'all_type_cour'));
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
        return view('Students.update_student', compact('student', 'all_classroom', 'all_type_cour'));
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
}
