<?php

namespace App\Http\Controllers;

use App\Helpers\RestHelper;
use App\Kiosque;
use App\Kiosque_service;
use App\Service;
use Illuminate\Http\Request;

use App\Http\Requests;

class KiosqueServiceCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return RestHelper::get(Kiosque_service::class);
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
        //return $request->all();
        $kiosque = Kiosque::find($request->kiosque_id);
        $kiosque->services()->sync($request->service);
        return $kiosque;
        //return RestHelper::store(Kiosque_service::class,$request);
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
        return RestHelper::show(Kiosque_services::class,$id);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function update_services_kiosque($kiosque_id){
        /*ici on met a jour la liste des services d'un kiosque donnee*/
    }
}
