<?php

namespace App\Http\Controllers;

use App\Models\AnneeUniversitaire;
use Illuminate\Http\Request;

class AnneeUniversitaireController extends Controller
{
    //
    public function listeanneeuniversitaire()
    {
        $allanneeuniversitaire = AnneeUniversitaire::all();
        return view('anneeuniversitaire.liste', compact('allanneeuniversitaire'));
    }

    public function popupanneeuniversitaire()
    {
        $allanneeuniversitaire = AnneeUniversitaire::all();
        return view('anneeuniversitaire.popup', compact('allanneeuniversitaire'));
    }

    public function creationanneeuniversitaireform()
    {
        return view('anneeuniversitaire.creation');
    }

    public function creationanneeuniversitaire(Request $request)
    {
        try{
            $this->validate($request, [
                'annee' => 'required',
            ]);
            AnneeUniversitaire::create($request->all());
            return back()->with('success', 'annee universitaire enregistrer.');
        }
        catch (\Exception $e) {
            // return back()->with('success', $e->getMessage().'');
            return back()->with('error', $e->getMessage().'');
            // return back()->with('error', $e);
            // echo "Erreur : ".$e->getMessage().'<br>';
            // var_dump($e);
        }
    }

    public function ficheanneeuniversitaire($idanneeuniversitaire)
    {
        $anneeuniversitaire = AnneeUniversitaire::whereId($idanneeuniversitaire)->first();
        return view('anneeuniversitaire.fiche', compact('anneeuniversitaire'));
    }

    public function modifieranneeuniversitireform($idanneeuniversitaire)
    {
        $anneeuniversitaire = AnneeUniversitaire::whereId($idanneeuniversitaire)->first();
        return view('anneeuniversitaire.modifier', compact('anneeuniversitaire'));
    }

    public function modifieranneeuniversitaire(Request $request, $idanneeuniversitaire)
    {
        $validatedData = $request->validate([
            'annee' => 'required',
        ]);
        AnneeUniversitaire::whereId($idanneeuniversitaire)->update($validatedData);

        return redirect('/listeanneeuniversitaire')->with('success', "L'annee universitaire a ete modifier.");
    }

    public function supprimeranneeuniversitaire($idanneeuniversitaire)
    {
        AnneeUniversitaire::whereId($idanneeuniversitaire)->delete();
        return redirect('/listeanneeuniversitaire')->with('success', "L'annee universitaire a ete supprimer.");
    }
}
