<?php

namespace App\Http\Controllers;

use App\Person;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class CompteCtrl extends Controller
{
    //
    public function register(Request $request){
        /*ici la requete de creation de compte d'un agent*/
        /*on teste dabord si les parametres sont bon i.e unicite du tel et du username*/
        $user_test = User::where('username',$request->username)->get();
        $person_test = Person::where('tel',$request->tel)->get();
        if(count($user_test)!=0 || count($person_test)!=0){
            $error = array();
            if (count($user_test)!=0){
                array_push($error,"Nom d'utilisateur indisponible");
            }
            if (count($person_test)!=0){
                array_push($error,"Numéro de téléphone occupé");
            }
            return response()->json(['error'=>$error]);
        }else{
            /*on continue avec la creation de compte*/
            /*on cree le user*/
            $user = User::create([
               "username"=>$request->username,
                'email'=>$request->username.'@gmail.com',
                "password"=>bcrypt($request->password),
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);
            /*on cree la personne*/
            $person = Person::create([
               "nom"=>$request->nom,
               "prenom"=>$request->prenom,
                "tel"=>$request->tel,
               "user_id"=>$user->id,
                "created_at"=>Carbon::now(),
                "updated_at"=>Carbon::now()
            ]);
            return response()->json(['success'=>"Création de compte effectuée avec succès"]);
        }
    }

    public function validation_compte(Request $request){

    }
}
