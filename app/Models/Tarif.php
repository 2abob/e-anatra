<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
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
            $modele->id = 'TAR' . str_pad(Sequence::getNextSequenceValue('sequence_tarif'), 3, '0', STR_PAD_LEFT);
        });
    }

    public $fillable = ['idAnnee', 'idParcour', 'idNiveau','ecolage', 'tranche1', 'tranche2', 'tranche3', 'tranche4'];
}
