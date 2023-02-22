<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\type_cours;
use Illuminate\Http\Request;

class TypeclasseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_all_type_cours()
    {
        $all_type_cour = type_cours::all();
//    dd($all_classroom ->find(3)->nom);

        return view('type_cours.show_all_type_cours', compact('all_type_cour'));
    }

    public function add_new_type_cours()
    {
        return view('type_cours.add_new_type_cours');
    }

    // Store Contact Form data
    public function add_new_type_coursForm(Request $request)
    {

        // Form validation
        $this->validate($request, [
            'type_cours' => 'required',
        ]);

        //  Store data in database
        type_cours::create($request->all());
        //
        return back()->with('success', 'Type de cours enregistrer.');
    }

    public function show_student_order_type_cours($id_type_cours)
    {
//        $all_student = student::where('id_type_cours', $id_type_cours)->join('type_cours', 'students.id_type_cours', '=', 'type_cours.id')->get();
        $all_student = student::join('classes', 'students.id_classe', '=', 'classes.id')
            ->join('type_cours', 'students.id_type_cours', '=', 'type_cours.id')
            ->select('students.*', 'classes.nom_classe', 'type_cours.type_cours')
            ->get();
        return view('type_cours.show_student_order_type_cours', compact('all_student'));
    }

    public function update_type_cours($type_cours_id)
    {
        $type_cours = type_cours::where('id', $type_cours_id)->first();
        return view('type_cours.update_type_cours', compact('type_cours'));
    }

    public function update_type_coursForm(Request $request, $type_cours_id)
    {
        $validatedData = $request->validate([
            'type_cours' => 'required',
        ]);
        type_cours::whereId($type_cours_id)->update($validatedData);

        return redirect('/show_all_type_cours')->with('success', 'Le type de cours a ete modifier.');
    }
    public function delete_type_cours($type_cours_id)
    {
        type_cours::where('id', $type_cours_id)->delete();
        return redirect('/show_all_type_cours')->with('success', 'Le type de cours a ete supprimer.');
    }
}
