<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{

    protected $fillable = [
        'referral_by', 
        'referral_to', 
        'is_referred', 
    ] ;

}
