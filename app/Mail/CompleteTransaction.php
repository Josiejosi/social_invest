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

    public $sender;
    public $receiver;
    public $url;
    public $amount;

    public function __construct( User $sender, User $receiver, $url, $amount )
    {
        $this->sender       = $sender ;
        $this->receiver     = $receiver ;
        $this->url          = $url ;
        $this->amount       = $amount ;
    }

    public function build()
    {
        return $this->markdown('emails.transaction.complete_transaction');
    }
}
