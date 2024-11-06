<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conservateur extends Model
{
    use HasFactory;

    protected $fillale = [
        'matricule',
        'nom',
        'postnom',
        'prenom',
        'date_naissance',
        'genre',
        'adresse'
    ];

    public function dossier(){
        return $this->hasMany(Dossier::class);
    }
}
