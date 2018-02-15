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
        //New settings
        //
        'donation_list_active',
        'support_active',
        'show_update_users',
        'update_message',
        'realtime_delay',
         
    ];

    public $timestamps = false;

}
