<?php

namespace App\Http\Controllers;

use App\Models\Dossier;
use App\Http\Requests\StoreDossierRequest;
use App\Http\Requests\UpdateDossierRequest;
use Illuminate\Http\Request;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dossier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDossierRequest $req)
    {
        $data = [
            'conservateur_id'=>$req->conservateur_id,
            'assujettie_id'=>$req->assujettie_id,
            'libele'=>$req->libele,
            'description'=>$req->description,
            'date_dossier'=>$req->date_dossier
        ];

        $insert = Dossier::create($data);
   
        if($insert){
            return response()->json([
                'success'=>true,
                'dossier'=>$insert,
            ]);
        }
         return response()->json([
                'success'=>false,
                'error'=>"Erreur de sauvegarde du dossier"
            ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Dossier $dossier)
    {
        $dossierShow = $dossier;
        if(!$dossier){
          return response()->json(['success'=>false, 'message'=>'pas de correspondance pour les données entrées']);  
        }
        return response()->json(['success'=>true, 'dossier'=>$dossierShow]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dossier $dossier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDossierRequest $request, Dossier $dossier, Request $req)
    {
        $data = [
            'conservateur_id'=>$req->conservateur_id,
            'assujettie_id'=>$req->assujettie_id,
            'libele'=>$req->libele,
            'description'=>$req->description,
            'date_dossier'=>$req->date_dossier
        ];

        $dossierEdit = $dossier;

        $update = $dossierEdit->update($data);
        if($update){
            return response()->json([
                'success'=>true,
                'message'=>'Mise à jour enregistrée avec success',
                'presence'=>$dossierEdit
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
    public function destroy(Dossier $dossier)
    {
        $dossier->delete();
        return response()->json(['success'=>true, 'message'=>'dossier supprimé avec success']);
    }
}
