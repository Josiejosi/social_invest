<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    
    protected $fillable = [
        'transaction_reference_code', 
        'amount', 
        'growth_amount', 
        'payday', 
        'deposit_type', 
        'level', 
        'status',  
        'donar_id', 
        'donee_id', 
    ];

    public function dream()
    {
        return $this->hasOne( Dream::class ) ;
    }

}
