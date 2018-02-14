<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Transaction ;
use App\Models\User ;

class CompleteTransaction extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction ;
    public $user ;

    public function __construct( User $user, $transaction )
    {
        $this->transaction         = $transaction ;
        $this->user                = $user ;
    }

    public function build()
    {
        return $this->markdown('emails.transaction.complete_transaction');
    }
}
