<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcour;
use App\Models\Mention;

class MentionsController extends Controller
{
    private $menumention, $menuparcour;

    public function __construct()
    {
        $this->middleware('auth');
        $this->menumention = Mention::all();
        $this->menuparcour = Parcour::all();
    }

    public function listemention()
    {
        $allmention = Mention::all();
        return view('mention.liste', ['allmention' => $allmention, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function popupmention()
    {
        $allmention = Mention::all();
        return view('mention.popup', compact('allmention'));
    }

    public function creationmentionform()
    {
        // var_dump($this->menumention);
        return view('mention.creation', ['menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function creationmention(Request $request)
    {
        try{
            $this->validate($request, [
                'mention' => 'required',
            ]);
            Mention::create($request->all());
            return back()->with('success', 'mention enregistrer.');
        }
        catch (\Exception $e) {
            // return back()->with('success', $e->getMessage().'');
            return back()->with('error', $e->getMessage().'');
            // return back()->with('error', $e);
            // echo "Erreur : ".$e->getMessage().'<br>';
            // var_dump($e);
        }
    }

    public function fichemention($idmention)
    {
        $mention = Mention::whereId($idmention)->first();
        return view('mention.fiche', ['mention' => $mention, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function modifiermentionform($idmention)
    {
        $mention = Mention::whereId($idmention)->first();
        return view('mention.modifier', ['mention' => $mention, 'menumention' => $this->menumention, 'menuparcour' => $this->menuparcour]);
    }

    public function modifiermention(Request $request, $idmention)
    {
        $validatedData = $request->validate([
            'mention' => 'required',
        ]);
        Mention::whereId($idmention)->update($validatedData);

        return redirect('/listemention')->with('success', 'La mention a ete modifier.');
    }

    public function supprimermention($idmention)
    {
        Mention::whereId($idmention)->delete();
        return redirect('/listemention')->with('success', 'La mention a ete supprimer.');
    }
}
