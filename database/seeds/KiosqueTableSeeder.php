<?php

use Illuminate\Database\Seeder;

class KiosqueTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ici on gere kelques informations dans la table kiosque
        $ville = ['yaounde'];
        $quartier = ['melen','emia','pharmacie emia','biyem-assi','carrefour scalom','scalom','rue djoungolo'];
        $description = ['kiosque orange money','kiosque orange money','kiosque orange money','kiosque orange money','kiosque orange money','kiosque orange money','kiosque orange money'];
        $latitude = [3.862983,3.864888,3.863311,3.844802,3.845477,3.846697,3.873648];
        $longitude = [11.500048,11.504426,11.501721,11.494187,11.499015,11.496365,11.522523];
        $i=0;
        foreach ($quartier as $value){
            \App\Kiosque::create([
                'quartier'=>$value,
                'ville'=>$ville[0],
                'description'=>$description[$i],
                'latitude'=>$latitude[$i],
                'longitude'=>$longitude[$i],
                'statut'=>1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
                'user_id'=>1,
                "nom_kiosque"=>"kiosque".$i
            ]);

            \App\Kiosque_service::create([
               'service_id'=>1,
                'kiosque_id'=>$i+1,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now()
            ]);
            $i++;
        }

    }
}
