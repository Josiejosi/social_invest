<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Transaction ;

class ConfirmPayment extends Mailable
{
    use Queueable, SerializesModels;

    public $transaction ;

    public function __construct( Transaction $transaction )
    {
        $this->transaction         = $transaction ;
    }

    public function build()
    {
        return $this->markdown('emails.transaction.confirm_payment');
    }
}
