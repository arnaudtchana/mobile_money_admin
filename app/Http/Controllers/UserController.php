<?php

namespace App\Http\Controllers;

use App\Helpers\RestHelper;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        /*$user= User::get();
        return $user;*/
        //dd('jarrive ici');
        return RestHelper::get(User::class);

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
        /*ici on doit recuperer le mot de passe et le crypter*/
        $data = $request->all();
        //dd($data);
        $user = User::create([
            'username'=>$data['username'],
            'email'=>$data['username'].'@gmail.com',
            'password'=>bcrypt($data['password']),
            'created_at'=>Carbon::now(),
            'updated_at'=>Carbon::now()
        ]);
        /*voir si apres un store on fait un return ou pas*/
        return $user;
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
        /*$user = User::findOrFail($id);
        return $user;*/
        //dd('jarrive ici');
        return RestHelper::show(User::class,$id);
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
        $user = User::findOrFail($id);
        return $user;
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
        $user = User::findOrFail($id);
        if($request->has('password')){
            $user->update(['username'=>$request->username,
                'password'=>bcrypt($request->password)]);
        }else{
            $user->update(['username'=>$request->username]);
        }

        return $user;
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
}
