<?php

use App\Http\Controllers\api\AssujettieController;
use App\Http\Controllers\api\ParcelleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('assujetties', AssujettieController::class);
Route::apiResource('parcelles', ParcelleController::class);
