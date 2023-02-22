<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ecolage extends Model
{
    use HasFactory;
    public $fillable = ['id_etudiant','mois','anne','status'];
}
