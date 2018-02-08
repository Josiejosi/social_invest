<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    protected $fillable = [

        'level', 
        'min_amount', 
        'max_amount', 

    ] ;

}
