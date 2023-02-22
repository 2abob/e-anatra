<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $fillable = ['id_classe', 'id_type_cours', 'matricule','image', 'nom', 'prenoms', 'date_de_naissance', 'nom_du_pere', 'nom_de_la_mere', 'contact_parent', 'sexe', 'adresse'];
}
