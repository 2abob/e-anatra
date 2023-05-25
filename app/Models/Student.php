<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($modele) {
            // $modele->id = 'ET' . str_pad(static::getNextId(), 7, '0', STR_PAD_LEFT);
            $modele->id = 'ET' . str_pad(Sequence::getNextSequenceValue('sequence_etudiant'), 7, '0', STR_PAD_LEFT);
        });
    }

    private static function getNextId()
    {
        $lastRecord = static::orderBy('id', 'desc')->first();

        if ($lastRecord) {
            $lastIdNumber = substr($lastRecord->id, 2); // Extrait les chiffres après 'ET'
            $nextIdNumber = intval($lastIdNumber) + 1;
            return $nextIdNumber;
        }

        return 1;
    }

    // public $fillable = ['id_classe', 'id_type_cours', 'matricule','image', 'nom', 'prenoms', 'date_de_naissance', 'nom_du_pere', 'nom_de_la_mere', 'contact_parent', 'sexe', 'adresse'];
    public $fillable = ['image', 'nom_etudiant', 'prenoms_etudiant', 'date_de_naissance', 'nom_du_pere', 'nom_de_la_mere', 'contact_parent', 'sexe', 'adresse'];
}
