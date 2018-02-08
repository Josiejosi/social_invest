<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_reference_code', 
        'amount', 
        'level', 
        'status',  
        'dream_id', 
        'donar_id', 
    ];

    public function dream()
    {
        return $this->hasOne( Dream::class ) ;
    }

}
