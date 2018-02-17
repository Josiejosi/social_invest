<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow ;

class LatestCryptoPrices implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $lastest_crypto ;
    
    public function __construct($lastest_crypto)
    {
        $this->lastest_crypto = $lastest_crypto ;
    }

    public function broadcastOn()
    {
        return new Channel( 'lastest-crypto' );
    }
}
