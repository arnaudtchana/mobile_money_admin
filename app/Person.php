<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use RestTrait;
    //
    protected $fillable = [
        'nom', 'prenom','tel','user_id'
    ];
    protected $table = 'persons';
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
