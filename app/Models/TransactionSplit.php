<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionSplit extends Model
{

	protected $table 	= 'transaction_split' ;

    protected $fillable = [

        'donation_amount', 
        'outstanding_amount', 
        'user_id', 
        'transaction_id', 

    ] ;
    
}
