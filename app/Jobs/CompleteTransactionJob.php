<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\CompleteTransaction ;

use Illuminate\Support\Facades\Mail;

use App\Models\Transaction ;
use App\Models\User ;

class CompleteTransactionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $transaction;

    public function __construct( User $user, Transaction $transaction )
    {
        $this->user = $user ;
        $this->transaction = $transaction ;
    }

    public function handle()
    {
        Mail::to( $this->user )->send(new CompleteTransaction( $this->user, $this->transaction ) );
    }
}
