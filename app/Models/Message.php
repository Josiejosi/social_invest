<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [

        'message', 
        'sender_id', 
        'receiver_id', 
        'transaction_id', 
        'is_linked_to_transaction', 

    ] ;

}
