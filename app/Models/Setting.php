<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $fillable = [

        'max_daily_users', 
        'max_daily_donations', 
        'useless_user_days', 
        'max_payment_days', 
        'max_confirmed_donations',
        'growth_percentage',
         
    ];

    public $timestamps = false;

}
