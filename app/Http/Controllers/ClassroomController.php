<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\Student;
use Illuminate\Http\Request;

class ClassroomController extends Controller
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

    public function show_all_classroom()
    {
        $all_classroom = classe::all();
//    dd($all_classroom ->find(3)->nom);

        return view('classroom.show_all_classroom', compact('all_classroom'));
    }

    public function add_new_classroom()
    {
        return view('classroom.add_new_classroom');
    }

    // Store Contact Form data
    public function add_new_classroomForm(Request $request)
    {

        // Form validation
        $this->validate($request, [
            'nom_classe' => 'required',
        ]);

        //  Store data in database
        classe::create($request->all());
        //
        return back()->with('success', 'La classe est enregistrer.');
    }

    public function show_student_order_classroom($id_classroom)
    {
//        $all_student = student::where('id_classe', $id_classroom)->join('classes', 'students.id_classe', '=', 'classes.id')->get();
        $all_student = student::where('students.id_classe', $id_classroom)
            ->join('classes' , 'students.id_classe' ,'=', 'classes.id')
            ->join('type_cours', 'students.id_type_cours', '=', 'type_cours.id')
            ->select('students.*', 'classes.nom_classe', 'type_cours.type_cours')
            ->get();
        return view('classroom.show_student_order_classroom', compact('all_student'));
    }

    public function classroom_delete($id_classroom)
    {
      classe::where('id',$id_classroom)->delete();

        return back()->with('success', 'La classe a ete supprimer.');
    }

    public function classroom_update($id_classroom)
    {
         $classe = classe::where('id',$id_classroom)->first();

        return view('classroom.classroom_update',compact('classe'));
    }

    public function classroom_updateForm(Request $request, $id_classroom)
    {
        $validatedData = $request->validate([
            'nom_classe' => 'required',
        ]);

        classe::whereId($id_classroom)->update($validatedData);

        return redirect('/show_all_classroom')->with('success', 'La classe a ete modifier.');
    }
}
