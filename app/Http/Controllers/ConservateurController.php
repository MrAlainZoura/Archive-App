<?php

namespace App\Http\Controllers;

use App\Models\Conservateur;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreConservateurRequest;
use App\Http\Requests\UpdateConservateurRequest;

class ConservateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $conservateur = Conservateur::latest()->get();
        return response()->json([
            'success'=>true,
            'assujettie'=>$conservateur
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConservateurRequest $request)
    {
    
        $validation = Validator::make($request->all(),[
            'matricule'=>'required|string',
            'nom'=>'required|string',
            'postnom'=>'required|string',
            'prenom'=>'required|string',
            'date_naissance'=>'required|date',
            'adresse'=>'required|string',
            'genre'=>'required|string',
        ]);

        if($validation->fails()){
            return $validation->errors();
        }

        $data = [
            'matricule'=>$request->nom,
            'nom'=>$request->nom,
            'postnom'=>$request->postnom,
            'prenom'=>$request->prenom,
            'date_naissance'=>$request->date_de_naissance,
            'adresse'=>$request->adresse,
            'genre'=>$request->genre,
        ];



        $insert = Conservateur::create($data);
   
        if($insert){
            return response()->json([
                'success'=>true,
                'conservateur'=>$insert,
            ]);
        }
         return response()->json([
                'success'=>false,
                'error'=>"Erreur de sauvegarde du conservateur"
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Conservateur $conservateur)
    {
        $conservateurShow = $conservateur;
        if($conservateurShow){
           return response()->json($conservateur); 
        }
        return response()->json(['success'=>false, 'message'=>'pas de correspondance pour les données enttrées']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conservateur $conservateur)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConservateurRequest $request, Conservateur $conservateur)
    {
        $validation = Validator::make($request->all(),[
            'matricule'=>'required|string',
            'nom'=>'required|string',
            'postnom'=>'required|string',
            'prenom'=>'required|string',
            'date_de_naissance'=>'required|date',
            'adresse'=>'required|string',
            'genre'=>'required|string',
        ]);

        if($validation->fails()){
            return $validation->errors();
        }

        $data = [
            'matricule'=>$request->nom,
            'nom'=>$request->nom,
            'postnom'=>$request->postnom,
            'prenom'=>$request->prenom,
            'date_naissance'=>$request->date_de_naissance,
            'adresse'=>$request->adresse,
            'genre'=>$request->genre,
        ];

        $conservateurEdit = $conservateur;

        $update = $conservateurEdit->update($data);
        if($update){
            return response()->json([
                'success'=>true,
                'message'=>'Mise à jour enregistrée avec success',
                'presence'=>$conservateur
            ]);
        }else{
            return response()->json([
                'success'=>false,
                'error'=>'Une erreur s est produite lors de la mise à jour',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conservateur $conservateur)
    {
        $conservateur->delete();
    }
}
