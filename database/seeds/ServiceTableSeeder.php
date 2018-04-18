<?php

use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ici le seed pour la table des services
        $nom_service = ["Orange money",'Mobile money','EU mobile money'];
        $description = [
            "Service proposé par l'opérateur Orange Cameroun",
            "Service proposé par l'opérateur Mtn",
            "Service proposé par la micro finance Express union"
        ];
        $logo = [
            "orange.jpg",
            "mtn.jpg",
            "eu.jpg"
        ];

        for($i=0;$i<count($nom_service);$i++){
         /*on cree chaque instance dans la table service*/
         \App\Service::create([
            'nom' =>$nom_service[$i],
            'description' =>$description[$i],
            'logo' =>$logo[$i],
             'created_at'=> \Carbon\Carbon::now(),
             'updated_at'=> \Carbon\Carbon::now()
         ]);
        }
    }
}
