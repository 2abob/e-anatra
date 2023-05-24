<?php

namespace App\Http\Controllers;

use App\Models\Parcour;
use Illuminate\Http\Request;

class ParcoursController extends Controller
{

    public function listeparcour()
    {
        $allparcour = Parcour::all();
        return view('parcour.liste', compact('allmention'));
    }

    public function popupparcour()
    {
        $allparcour = Parcour::all();
        return view('parcour.popup', compact('allmention'));
    }

    public function creationparcourform()
    {
        return view('parcour.creation');
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
        return view('parcour.fiche', compact('mention'));
    }

    public function modifierparcourform($idparcour)
    {
        $parcour = Parcour::whereId($idparcour)->first();
        return view('parcour.modifier', compact('mention'));
    }

    public function modifierparcour(Request $request, $idparcour)
    {
        $validatedData = $request->validate([
            'idMention' => 'required',
            'parcours' => 'required',
        ]);
        Parcour::whereId($idparcour)->update($validatedData);

        return redirect('/listeparcour')->with('success', 'Le parcour a ete modifier.');
    }

    public function supprimerparcour($idparcour)
    {
        Parcour::whereId($idparcour)->delete();
        return redirect('/listeparcour')->with('success', 'Le parcour a ete supprimer.');
    }
}
