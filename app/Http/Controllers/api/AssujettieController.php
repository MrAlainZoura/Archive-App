<?php

namespace App\Http\Controllers\api;

use App\Models\Assujettie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class AssujettieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assujettie = Assujettie::latest()->get();
        return response()->json([
            'success'=>true,
            'assujettie'=>$assujettie,
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
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'nom'=>'required',
            'postnom'=>'required',
            'prenom'=>'required',
            'date_de_naissance'=>'required|date',
            'adresse'=>'required',
            'genre'=>'required',
            'etat_civil'=>'required',
            'nombre_enfant'=>'required|int'
        ]);

        if($validation->fails()){
            return $validation->errors();
        }

        $data = [
            'nom'=>$request->nom,
            'postnom'=>$request->postnom,
            'prenom'=>$request->prenom,
            'date_de_naissance'=>$request->date_de_naissance,
            'adresse'=>$request->adresse,
            'genre'=>$request->genre,
            'etat_civil'=>$request->etat_civil,
            'nombre_enfant'=>$request->nombre_enfant
        ];

        $insert = Assujettie::create($data);
    //    $insert= DB::table('assujetties')->insertOrIgnore([
    //         $data
    //     ]);
        if($insert){
            return response()->json([
                'success'=>true,
                'assujettie'=>$insert,
            ]);
        }
         return response()->json([
                'success'=>false,
                'error'=>"Erreur de sauvegarde de l'assujettie"
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $assujettie = Assujettie::find($id);
        return response()->json([
            'success'=>true,
            'assujettie'=>$assujettie,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)

    {
        $validation = Validator::make($request->all(),[
            'postnom'=>'required',
            'prenom'=>'required',
            'date_de_naissance'=>'required',
            'adresse'=>'required',
            'genre'=>'required',
            'etat_civil'=>'required',
            'nombre_enfant'=>'required'
        ]);

        if($validation->fails()){
            return $validation->errors();
        }

        $data = [
            'postnom'=>$request->postnom,
            'prenom'=>$request->prenom,
            'date_de_naissance'=>$request->date_de_naissance,
            'adresse'=>$request->adresse,
            'genre'=>$request->genre,
            'etat_civil'=>$request->etat_civil,
            'nombre_enfant'=>$request->nombre_enfant
        ];

        $assujettie = Assujettie::where('id',$id)->first();

        if(!$assujettie){
            return response()->json([
                'success'=>false,
                'message'=>'Erreur revenez plus tard'
            ]);
        }

        $update = Assujettie::where('id',$id)->update($data);
        if($update){
            return response()->json([
                'success'=>true,
                'message'=>'Mise à jour enregistrée avec success',
                'presence'=>Assujettie::find($assujettie->id)
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
    public function destroy(string $id)
    {
        $delete = Assujettie::where('id',$id)->delete();
        return response()->json([
            'success'=>true,
            'message'=>"Supprimé avec succès"
        ]);
    }
}
