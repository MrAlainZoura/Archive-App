<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dossier extends Model
{
    use HasFactory;

    protected $fillable = [
        'conservateur_id',
        'assujettie_id',
        'libele',
        'description',
        'date_dossier'
    ];

    public function conservateur(){
        return $this->belongsTo(Conservateur::class);
    }
    public function assujettie(){
        return $this->belongsTo(Assujettie::class);
    }
}
