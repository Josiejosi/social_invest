<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Wallet ;
use App\Models\User ;

class CreateBlockChainWallet extends Mailable
{
    use Queueable, SerializesModels;

    public $user ;
    public $wallet ;

    public function __construct( User $user, Wallet $wallet )
    {
        $this->user         = $user ;
        $this->wallet       = $wallet ;
    }

    public function build()
    {
        return $this->markdown('emails.wallet.create');
    }
}
