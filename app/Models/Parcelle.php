<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;
    protected $fillable =[
        'titre_propriete_id',
        'adresse',
        'superficie'
];

    public function titre_propriete(){
        return $this->belongsTo(Titre_propriete::class);
    }
}
