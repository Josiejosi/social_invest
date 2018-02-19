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

    protected $dates = [ 'payday' ];

    public function donar()
    {
        return $this->hasOne( User::class, 'id', 'donar_id' ) ;
    }

    public function donee()
    {
        return $this->hasOne( User::class, 'id', 'donee_id' ) ;
    }

}
