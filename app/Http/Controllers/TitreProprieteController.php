<?php

namespace App\Http\Controllers;

use App\Models\Titre_propriete;
use App\Http\Requests\StoreTitre_proprieteRequest;
use App\Http\Requests\UpdateTitre_proprieteRequest;

class TitreProprieteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titres = Titre_propriete::all();
        return response()->json(['success'=>true, 'titres'=>$titres]);
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
    public function store(StoreTitre_proprieteRequest $request)
    {
        $data = [
            'assujettie_id'=>$request->assujettie_id,
            'numero'=>$request->numero,
            'description'=>$request->description,
            'libele'=>$request->libele,
            'date_titre'=>$request->date_titre
        ];
        $insert = Titre_propriete::create($data);
        if($insert){
            return response()->json([
                'success'=>true,
                'dossier'=>$insert,
            ]);
        }
         return response()->json([
                'success'=>false,
                'error'=>"Erreur de sauvegarde du de titre"
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Titre_propriete $titre_propriete)
    {
        $titre = $titre_propriete;
        return response()->json(['success'=>true, 'titre'=>$titre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Titre_propriete $titre_propriete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTitre_proprieteRequest $request, Titre_propriete $titre_propriete)
    {
        $data = [
            'id'=>$request->id,
            'assujettie_id'=>$request->assujettie_id,
            'numero'=>$request->numero,
            'description'=>$request->description,
            'libele'=>$request->libele,
            'date_titre'=>$request->date_titre
        ];
        $titreEdit = $titre_propriete;
        $update = $titreEdit->update($data);
        if($update){
            return response()->json([
                'success'=>true,
                'message'=>'Mise à jour enregistrée avec success',
                'presence'=>$titreEdit
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
    public function destroy(Titre_propriete $titre_propriete)
    {
        $titre_propriete->delete();
        return response()->json(['success'=>true, 'message'=>'titre supprimé avec success']);
    }
}
