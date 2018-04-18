<?php

namespace App\Http\Controllers;

use App\Kiosque_service;
use App\Models\Upload;
use App\Service;
use GoogleMaps\GoogleMaps;
use Illuminate\Http\Request;

use App\Http\Requests;

class GoogleMapsCtrl extends Controller
{
    //
    public function test(){
        /*ce code paermet de calculer la distance et le temps mis entre deux points dont on connait les geocoordonnees*/
        /*maintenant kon a ajouter le parametre ville dans notre base de donnees, on pourra faire la recherhce plus facilement
        on va commencer par recuperer la ville de celui qui fait la requete, ensuite, on calcule le temps qui le separe avec les
        differents points du service choisi, on fait le tri et on recupere les points les plus proches kon envoie au mobile
         *ici on recoit le code du service rechercher ainsi que la posoition geographique de l'utilisateur */
        $response = \GoogleMaps::load('distancematrix')
            ->setParam (['origins' =>'3.840142,11.511906','destinations'=>'3.851235,11.493566'])
            ->get();
        /*$response = \GoogleMaps::load('geocoding')
            ->setParam(['latlng'=>'4.036273, 9.694039'
            ])
            ->get();*/

        //dd(json_decode($response)->rows[0]->elements[0]->duration->text);
        $temps = json_decode($response)->rows[0]->elements[0]->duration->text;
        $t = intval(explode(" ",$temps)[0]);
        dd($t);
        dd($response->results->formatted_address);
    }

    public function retourne_service(Request $request){
        /*ici on retourne la liste des services*/
        //dd($request->latitude);
        /*on recupere la ville correspondante aux coordonnees recues*/

        /*$response = \GoogleMaps::load('distancematrix')
            ->setParam (['origins' =>'3.840142,11.511906','destinations'=>'3.851235,11.493566'])
            ->get();*/
        $response = \GoogleMaps::load('geocoding')
            ->setParam(['latlng'=>''.$request->latitude.','.$request->longitude
            ])
            ->get();
        $ville = json_decode($response)->results[0]->formatted_address;
        $table = explode(', ',$ville);
        /*on peut maintenant faire la requete au niveau de la base de donnees vu que nous avons la ville et le service*/
        $kiosque = Kiosque_service::where('service_id',$request->service_id)
            ->join('kiosques','kiosque_services.kiosque_id','=','kiosques.id')
            ->where('ville',$table[1])
            ->get();
        $kiosque_proche = array();
        /*on fait un foreach en calculant les distances et on retient dans un tableau
         celles qui sont inferieures a 5 mins*/
        foreach ($kiosque as $value){
            $response = \GoogleMaps::load('distancematrix')
                ->setParam (['origins' =>''.$request->latitude.','.$request->longitude.'','destinations'=>''.$value->latitude.','.$value->longitude.''])
                ->get();
            /*on recupere le temps en minutes*/
            $temps = json_decode($response)->rows[0]->elements[0]->duration->text;
            /*on recupere la valeur exacte kon cast pour comparer les temps*/
            $t = intval(explode(" ",$temps)[0]);
            if($t<40){
                array_push($kiosque_proche,$value);
            }
            //dd($t);
        }

        /*a ce niveau on doit calculer les distances pour recuperer les services les plua proches*/

        /*avant de sortir d'ici on recupere le l'icone pour la map de localisation*/
        $icone_localisation = Service::find($request->service_id);
       // return $icone_localisation;
        $icone_localisation = Upload::find($icone_localisation->localisation_icone);
        $img = $icone_localisation->path();
        return response()->json(['ville'=>$table[1],'donne'=>$kiosque_proche,'icone'=>$img]);
    }
}
