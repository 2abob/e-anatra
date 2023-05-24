<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NiveauController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function test()
    {
        return view('niveau.liste');
    }

    public function listeniveaux()
    {
        $allniveau = Niveau::all();
        return view('niveau.liste', compact('allniveau'));
    }

    public function popupniveau()
    {
        $allniveau = Niveau::all();
        return view('niveau.popup', compact('allniveau'));
    }

    public function creationniveauform()
    {
        return view('niveau.creation');
    }

    public function creationniveau(Request $request)
    {
        try{
            $this->validate($request, [
                'niveau' => 'required',
            ]);
            Niveau::create($request->all());
            return back()->with('success', 'niveau enregistrer.');
        }
        catch (\Exception $e) {
            // return back()->with('success', $e->getMessage().'');
            return back()->with('error', $e->getMessage().'');
            // return back()->with('error', $e);
            // echo "Erreur : ".$e->getMessage().'<br>';
            // var_dump($e);
        }
    }

    public function ficheniveau($idniveau)
    {
        $niveau = Niveau::whereId($idniveau)->first();
        return view('niveau.fiche', compact('niveau'));
    }

    public function modifierniveauform($idniveau)
    {
        $niveau = Niveau::whereId($idniveau)->first();
        return view('niveau.modifier', compact('niveau'));
    }

    public function modifierniveau(Request $request, $idniveau)
    {
        $validatedData = $request->validate([
            'niveau' => 'required',
        ]);
        Niveau::whereId($idniveau)->update($validatedData);

        return redirect('/listeniveaux')->with('success', 'Le niveau a ete modifier.');
    }

    public function supprimerniveau($idniveau)
    {
        Niveau::whereId($idniveau)->delete();
        return redirect('/listeniveaux')->with('success', 'Le niveau a ete supprimer.');
    }
}
