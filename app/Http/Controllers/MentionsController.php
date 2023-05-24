<?php

namespace App\Http\Controllers;

use App\Models\Mention;
use Illuminate\Http\Request;

class MentionsController extends Controller
{

    public function listemention()
    {
        $allmention = Mention::all();
        return view('mention.liste', compact('allmention'));
    }

    public function popupmention()
    {
        $allmention = Mention::all();
        return view('mention.popup', compact('allmention'));
    }

    public function creationmentionform()
    {
        return view('mention.creation');
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
        return view('mention.fiche', compact('mention'));
    }

    public function modifiermentionform($idmention)
    {
        $mention = Mention::whereId($idmention)->first();
        return view('mention.modifier', compact('mention'));
    }

    public function modifiermention(Request $request, $idmention)
    {
        $validatedData = $request->validate([
            'mention' => 'required',
        ]);
        Mention::whereId($idniveau)->update($validatedData);

        return redirect('/listemention')->with('success', 'La mention a ete modifier.');
    }

    public function supprimermention($idmention)
    {
        Mention::whereId($idmention)->delete();
        return redirect('/listemention')->with('success', 'La mention a ete supprimer.');
    }
}
