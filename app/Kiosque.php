<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class Kiosque extends Model
{
    use RestTrait;
    //
    protected $casts = [
        'statut' => 'boolean',
    ];
    protected $fillable = [
        'quartier', 'description','latitude','longitude','statut','user_id','ville','nom_kiosque'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function services(){
        return $this->belongsToMany('App\Service','kiosque_services','kiosque_id','service_id');
    }
}
