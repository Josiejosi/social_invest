<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [

        'guid', 
        'address', 
        'label', 
        'email',
         
        'user_id', 
        'password', 

    ] ;
}
