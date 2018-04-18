<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class Role_user extends Model
{
    use RestTrait;
    //
    protected $fillable = [
        'role_id','user_id'
    ];
}
