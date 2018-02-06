<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'bank_name', 
        'account_number', 
        'branch_code', 
        'is_active', 
        'user_id', 
    ];
}
