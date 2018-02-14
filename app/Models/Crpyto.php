<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Crpyto extends Model
{

    protected $fillable = [
        'name', 
        'address', 
        'is_active', 
        'user_id', 
    ];
    
}
