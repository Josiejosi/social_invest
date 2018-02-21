<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use App\Mail\CompleteTransaction ;

use Illuminate\Support\Facades\Mail;

use App\Models\User ;

class CompleteTransactionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $sender;
    protected $receiver;
    protected $url;
    protected $amount;

    public function __construct( User $sender, User $receiver, $url, $amount )
    {
        $this->sender       = $sender ;
        $this->receiver     = $receiver ;
        $this->url          = $url ;
        $this->amount       = $amount ;
    }

    public function handle()
    {
        Mail::to( $this->receiver )->send(new CompleteTransaction( $this->sender, $this->receiver, $this->url, $this->amount ) );
    }
}
