<?php

namespace App\Http\Controllers;

use App\Models\AnneeUniversitaire;
use Illuminate\Http\Request;
use App\Models\Parcour;
use App\Models\Mention;

class AnneeUniversitaireController extends Controller
{
    private $menumention, $menuparcour;

    public function __construct()
    {
        $this->middleware('auth');
        $this->menumention = Mention::all();
        $this->menuparcour = Parcour::all();
    }

    public function listeanneeuniversitaire()
    {
        $allanneeuniversitaire = AnneeUniversitaire::all();
        return view('anneeuniversitaire.liste', ['allanneeuniversitaire' => $allanneeuniversitaire, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function popupanneeuniversitaire()
    {
        $allanneeuniversitaire = AnneeUniversitaire::all();
        return view('anneeuniversitaire.popup', compact('allanneeuniversitaire'));
    }

    public function creationanneeuniversitaireform()
    {
        return view('anneeuniversitaire.creation', ['menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
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
        return view('anneeuniversitaire.fiche', ['anneeuniversitaire' => $anneeuniversitaire, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function modifieranneeuniversitireform($idanneeuniversitaire)
    {
        $anneeuniversitaire = AnneeUniversitaire::whereId($idanneeuniversitaire)->first();
        return view('anneeuniversitaire.modifier', ['anneeuniversitaire' => $anneeuniversitaire, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
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
