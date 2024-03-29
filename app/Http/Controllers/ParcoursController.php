<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcour;
use App\Models\Mention;

class ParcoursController extends Controller
{
    private $menumention, $menuparcour;

    public function __construct()
    {
        $this->middleware('auth');
        $this->menumention = Mention::all();
        $this->menuparcour = Parcour::all();
    }

    public function listeparcour()
    {
        $allparcour = Parcour::all();
        return view('parcour.liste', ['allparcour' => $allparcour, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function popupparcour()
    {
        $allparcour = Parcour::all();
        return view('parcour.popup', compact('allparcour'));
    }

    public function creationparcourform()
    {
        return view('parcour.creation', ['menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function creationparcour(Request $request)
    {
        try{
            $this->validate($request, [
                'idMention' => 'required',
                'parcour' => 'required',
            ]);
            Parcour::create($request->all());
            return back()->with('success', 'parcour enregistre.');
        }
        catch (\Exception $e) {
            // return back()->with('success', $e->getMessage().'');
            return back()->with('error', $e->getMessage().'');
            // return back()->with('error', $e);
            // echo "Erreur : ".$e->getMessage().'<br>';
            // var_dump($e);
        }
    }

    public function ficheparcour($idparcour)
    {
        $parcour = Parcour::whereId($idparcour)->first();
        return view('parcour.fiche', ['parcour' => $parcour, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function modifierparcourform($idparcour)
    {
        $parcour = Parcour::whereId($idparcour)->first();
        return view('parcour.modifier', ['parcour' => $parcour, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function modifierparcour(Request $request, $idparcour)
    {
        try{
            $validatedData = $request->validate([
                'idMention' => 'required',
                'parcour' => 'required',
            ]);
            Parcour::whereId($idparcour)->update($validatedData);

            return redirect('/listeparcour')->with('success', 'Le parcour a ete modifier.');
        }
        catch (\Exception $e) {
            // return back()->with('success', $e->getMessage().'');
            return redirect('/listeparcour')->with('error', $e->getMessage().'');
            // return back()->with('error', $e);
            // echo "Erreur : ".$e->getMessage().'<br>';
            // var_dump($e);
        }
    }

    public function supprimerparcour($idparcour)
    {
        Parcour::whereId($idparcour)->delete();
        return redirect('/listeparcour')->with('success', 'Le parcour a ete supprimer.');
    }
}
