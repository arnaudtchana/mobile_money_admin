<?php

namespace App\Http\Controllers;

use App\Helpers\RestHelper;
use App\Kiosque;
use App\Kiosque_service;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class kiosqueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /*$kiosque= Kiosque::get();
        return $kiosque;*/
        return RestHelper::get(Kiosque::class);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //dd("je suis ici");
        $kiosque = Kiosque::create($request->all());
        /*on remplit maintenant la table kiosque service*/
        /*on fait un foreach sur la table des services pour enregistrer tous les services du
        kiosque*/
        foreach ($request->service as $service_id){
            $kiosque_service = Kiosque_service::create([
                'kiosque_id'=>$kiosque->id,
                'service_id'=>$service_id,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ]);
    }

        return $kiosque;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return RestHelper::show(Kiosque::class,$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kiosque = Kiosque::findOrFail($id);
        return $kiosque;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        if($request->has('service')){
            /*la requete concerne la mise a jour de tout le kiosque*/
            $kiosque_update = Kiosque::find($id);
            $kiosque_update->update($request->all());
            return $kiosque_update;
        }else{
            /*dans le cas contraire il s'agit de la mise a jour du statut*/
            if($request->statut == "true"){
                $valeur_statut = 1;
            }else{
                $valeur_statut = 0;
            }
            $kiosque = Kiosque::find($id);
            $kiosque->statut = $valeur_statut;
            $kiosque->update();
            // $kiosque->save();
            return $valeur_statut;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //ici on supprime le kiosque dont on a l'id
        /*on supprime dabord tout les kiosque service pour le kiosque concerner*/
        $kiosque_service_delete = Kiosque_service::where('kiosque_id',$id)
            ->delete();
        return RestHelper::destroy(Kiosque::class,$id);
    }

}
