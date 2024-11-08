<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titre_propriete extends Model
{
    use HasFactory;
    protected $fillable = [
        'assujettie_id',
        'numero',
        'description',
        'libele',
        'date_titre'
    ];

    public function assujettie(){
        return $this->belongsTo(Assujettie::class);
    }
    public function parcelle(){
        return $this->hasMany(Parcelle::class);
    }
}
