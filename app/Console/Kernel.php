<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use App\Helpers\Helper ;

use App\Models\Btc ;
use App\Models\Eth ;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        //
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {

            $btc = Helper::getCryptoData() ;
            $eth = Helper::getETHData() ;

            Btc::create([ 'btc' => $btc ]) ;
            Eth::create([ 'eth' => $eth ]) ;

            event( new \App\Events\LatestCryptoPrices( [ 'btc' => $btc, 'eth' => $eth ] ) ) ;

        })->everyFiveMinutes() ;
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
