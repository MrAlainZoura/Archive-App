<?php

namespace App\Http\Controllers\api;

use App\Models\Parcelle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ParcelleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parcelle = Parcelle::latest()->get();
        return response()->json([
            'success'=>true,
            'assujettie'=>$parcelle,
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
            'assujettie_id'=>'required',
            'adresse'=>'required|string',
            'superficie'=>'required'
        ]);

        if($validation->fails()){
            return $validation->errors();
        }

        $data = [
            'assujettie_id'=>$request->assujettie_id,'adresse'=>$request->adresse,'superficie'=>$request->superficie
        ];

        $insert = Parcelle::create($data);
    //    $insert= DB::table('parcelles')->insertOrIgnore([
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
                'error'=>"Erreur de sauvegarde de la parcelle"
            ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $parcelle = Parcelle::find($id);
        return response()->json([
            'success'=>true,
            'assujettie'=>$parcelle,
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
            'assujettie_id'=>'required',
            'adresse'=>'required|string',
            'superficie'=>'required|double'
        ]);

        if($validation->fails()){
            return $validation->errors();
        }

        $data = [
            'assujettie_id'=>$request->assujettie_id,'adresse'=>$request->adresse,'superficie'=>$request->superficie
        ];

        $parcelleFound = Parcelle::where('id',$id)->first();
        
        if(!$parcelleFound){
            return response()->json([
                'success'=>false,
                'message'=>'Erreur revenez plus tard'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Parcelle::where('id',$id)->delete();
        return response()->json([
            'success'=>true,
            'message'=>"Supprimé avec succès"
        ]);
    }
}
