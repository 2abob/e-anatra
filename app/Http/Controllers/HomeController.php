<?php

namespace App\Http\Controllers;

use App\Models\classe;
use App\Models\ecolage;
use App\Models\Student;
use App\Models\type_cours;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parcour;
use App\Models\Mention;

class HomeController extends Controller
{
    private $menumention, $menuparcour;

    public function __construct()
    {
        $this->middleware('auth');
        $this->menumention = Mention::all();
        $this->menuparcour = Parcour::all();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $count_all_student = student::all()->count();
        $count_all_classroom = classe::all()->count();
        $count_all_type_cours = type_cours::all()->count();
        $count_all_ecolage = ecolage::all()->count();
        // $test = DB::select('call getResultSet(103)');

        return view('home',compact('count_all_classroom','count_all_student','count_all_type_cours','count_all_ecolage'));
    }
}
