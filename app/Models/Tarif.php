<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    use HasFactory;

    public $fillable = ['idAnnee', 'idParcour', 'idNiveau','ecolage', 'tranche1', 'tranche2', 'tranche3', 'tranche4'];
}
