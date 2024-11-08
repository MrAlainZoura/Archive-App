<?php

use App\Http\Controllers\ConservateurController;
use App\Http\Controllers\DossierController;
use App\Http\Controllers\TitreProprieteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('conservateurs', ConservateurController::class);
Route::resource('titre_proprietes', TitreProprieteController::class);
Route::resource('dossiers', DossierController::class);
