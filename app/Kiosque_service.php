<?php

namespace App;

use App\Traits\RestTrait;
use Illuminate\Database\Eloquent\Model;

class Kiosque_service extends Model
{
    use RestTrait;
    //
    protected $fillable = [
        'kiosque_id', 'service_id',
    ];
   // protected $table = 'kiosque_service';
}
