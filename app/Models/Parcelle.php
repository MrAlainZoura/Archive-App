<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcelle extends Model
{
    use HasFactory;
    protected $fillable =['assujettie_id','adresse','superficie'];

    public function assujettie(){
        return $this->belongsTo(Assujettie::class);
    }
}
