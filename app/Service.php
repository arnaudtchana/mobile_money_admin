<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use RestTrait,SoftDeletes;
    //
    protected $fillable = [
        'nom', 'description','logo','localisation_icone'
    ];

    public function kiosques(){
        return $this->belongsToMany('App\Kiosque');
    }
}
