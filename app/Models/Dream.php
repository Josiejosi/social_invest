<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dream extends Model
{
    protected $fillable = [
        'name', 
        'amount', 
        'growth_amount', 
        'payday', 
        'level', 
        'deposit_type', 
        'user_id', 
    ];
}
