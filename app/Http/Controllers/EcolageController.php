<?php

namespace App\Http\Controllers;

use App\Models\ecolage;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Parcour;
use App\Models\Mention;
use App\Models\EcolageEtudiant;

class EcolageController extends Controller
{
    protected $menumention, $menuparcour;

    public function __construct()
    {
        $this->middleware('auth');
        $menumention = Parcour::all();
        $menuparcour = Mention::all();
    }

    public function ecolage_student_detail()
    {
        $all_student = student::join('classes', 'students.id_classe', '=', 'classes.id')
            ->join('type_cours', 'students.id_type_cours', '=', 'type_cours.id')
            ->select('students.*', 'classes.nom_classe', 'type_cours.type_cours')
            ->get();
        return view('ecolage.ecolage_student_detail',compact('all_student', 'menumention', 'menuparcour'));
    }
    public function details_ecolage($id_student){
//        dd($id_student);
        $ecolage_student = ecolage::whereId($id_student)->join('students','students.id','=','ecolages.id_etudiant')
            ->select('students.*', 'ecolages.*', 'ecolages.created_at')
            ->get();
//        foreach ( $ecolage_student as  $ecolage_students){
////            $ecolage_students->created_at;
//            dd($ecolage_students->created_at);
//        }
//        dd($ecolage_student);
//        if()
        $all_student = student::join('classes', 'students.id_classe', '=', 'classes.id')
            ->join('type_cours', 'students.id_type_cours', '=', 'type_cours.id')
            ->select('students.*', 'classes.nom_classe', 'type_cours.type_cours')
            ->where('students.id',$id_student)
            ->first();
        return view('ecolage.details_ecolage',compact('ecolage_student','all_student', 'menumention', 'menuparcour'));

    }
    public function new_ecolageForm(Request $request, $id_student){
       //  Form validation
        $this->validate($request, [
            'mois' => 'required',
            'anne' => 'required',
        ]);
//        dd($id_student);
//        $request -> id_etudiant = $id_student;

        $request->request->add(['id_etudiant' => $id_student]); //add request
        ecolage::create($request->all());
        return back()->with('success', "Le payement a ete enregistrer.");

//        ecolage::create(array_merge($request->all(), ['id_etudiant' => $id_student]));

//        $data->id_etudiant = $id_student;
//        $data->save();
//   dd($id_student);
//        $ecolage_student = ecolage::where('id_etudiant',$id_students)->join('students','students.id','=','ecolages.id_etudiant')->get();
//        if(!$ecolage_student -> count()){
//            dd('vide');
//        }
//        foreach ($ecolage_student as $ecolage_students){
//         $ecolage_students->nom;
//         var_dump( $ecolage_students->mois);
//        }
//        dd($ecolage_student);
//
////        $etudiant = student::where('id',$ecolage_student->id_etudiant)->first();
//        dd($etudiant->nom);

    }

    public function history_ecolage(){
//        $student_ecolage_non_payer = student::join('ecolages', 'students.id', '=','null')->get();
//        $student_ecolage_non_payer = student::join('ecolages', 'students.id', '=', 'ecolages.id_etudiant')->get();
//        $all_student = student::all();
//        foreach ($student_ecolage_non_payer as $students){
//            foreach ($all_student as $all_students){
//                if($all_students->nom != $students->nom){
//                    var_dump($all_students->nom);
//                }
//            }
//        }
        $all_student = ecolage::join('students', 'ecolages.id_etudiant', '=', 'students.id')
            ->select('students.*', 'ecolages.*', 'ecolages.created_at','students.id')
            ->get();


        return view('ecolage.history_ecolage',compact('all_student', 'menumention', 'menuparcour'));

    }

    public function attribuertarif($idEtudiant)
    {
        return view('ecolage.attribution', ['idEtudiant' => $idEtudiant, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function attribuertarifconfirmation(Request $request)
    {
        try{
            $this->validate($request, [
                'idEtudiant' => 'required',
                'idTarif' => 'required'
            ]);
            EcolageEtudiant::create($request->all());
            return back()->with('success', 'tarif attribuee.');
        }
        catch (\Exception $e) {
            // return back()->with('success', $e->getMessage().'');
            return back()->with('error', $e->getMessage().'');
            // return back()->with('error', $e);
            // echo "Erreur : ".$e->getMessage().'<br>';
            // var_dump($e);
        }
    }

    public function attribuertarifavancer($idEtudiant)
    {
        return view('ecolage.attributionav', ['idEtudiant' => $idEtudiant, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function attribuertarifavancerconfirmation(Request $request)
    {
        try{
            $this->validate($request, [
                'idEtudiant' => 'required',
                'idNiveau' => 'required',
                'idParcour' => 'required',
                'idAnnee' => 'required',
            ]);
            EcolageEtudiant::create($request->all());
            return back()->with('success', 'tarif attribuee.');
        }
        catch (\Exception $e) {
            // return back()->with('success', $e->getMessage().'');
            return back()->with('error', $e->getMessage().'');
            // return back()->with('error', $e);
            // echo "Erreur : ".$e->getMessage().'<br>';
            // var_dump($e);
        }
    }

    public function ficheecolageetudiant($idEcolage)
    {
        $ecolage = DB::table('listeetudiantmention')->where('id', $idEcolage)->first();
        return view('ecolage.ficheecolageetudiant', ['ecolage' => $ecolage, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }
}
