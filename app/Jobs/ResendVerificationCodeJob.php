<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Support\Facades\Mail;

use App\Mail\VerificationEmail ;

use App\Models\User ;

class ResendVerificationCodeJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    public function __construct( User $user )
    {
        $this->user = $user ;
    }

    public function handle()
    {
        Mail::to( $this->user )->send(new VerificationEmail( $this->user ) );
    }
}
