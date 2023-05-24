<?php

namespace App\Http\Controllers;

use App\Models\Tarif;
use Illuminate\Http\Request;

class TarifsController extends Controller
{
    //

    public function listetarif()
    {
        $alltarif = Tarif::all();
        return view('tarif.liste', compact('alltarif'));
    }

    public function popuptarif()
    {
        $alltarif = Tarif::all();
        return view('tarif.popup', compact('alltarif'));
    }

    public function creationtarifform()
    {
        return view('tarif.creation');
    }

    public function creationtarif(Request $request)
    {
        try{
            $this->validate($request, [
                'idParcour' => 'required',
                'idNiveau' => 'required',
                'ecolage' => 'required',
                'tranche1' => 'required',
                'tranche2' => 'required',
                'tranche3' => 'required',
                'tranche4' => 'required',
            ]);
            Tarif::create($request->all());
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

    public function fichetarif($idtarif)
    {
        $tarif = Tarif::whereId($idtarif)->first();
        return view('tarif.fiche', compact('tarif'));
    }

    public function modifiertarifform($idtarif)
    {
        $tarif = Tarif::whereId($idtarif)->first();
        return view('tarif.modifier', compact('tarif'));
    }

    public function modifiertarif(Request $request, $idtarif)
    {
        $validatedData = $request->validate([
            'idParcour' => 'required',
            'idNiveau' => 'required',
            'ecolage' => 'required',
            'tranche1' => 'required',
            'tranche2' => 'required',
            'tranche3' => 'required',
            'tranche4' => 'required',
        ]);
        Tarif::whereId($idtarif)->update($validatedData);

        return redirect('/listetarif')->with('success', 'Le parcour a ete modifier.');
    }

    public function supprimertarif($idtarif)
    {
        Tarif::whereId($idtarif)->delete();
        return redirect('/listetarif')->with('success', 'Le parcour a ete supprimer.');
    }
}
