<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assujettie extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'postnom',
        'prenom',
        'date_de_naissance',
        'adresse',
        'genre',
        'etat_civil',
        'nombre_enfant'
    ];

    public function parcelle(){
        return $this->hasMany(Parcelle::class);
    }
}
