<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

use Illuminate\Support\Facades\Mail;

use App\Mail\CreateBlockChainWallet ;

use App\Models\Wallet ;
use App\Models\User ;
use App\Models\Crpyto ;
use App\Models\UserBalance ;

use App\Helpers\Helper ;

class CreateWalletJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;
    protected $password;

    public function __construct( User $user, $password )
    {
        $this->user                     = $user ;
        $this->password                 = $password ;
    }

    public function handle()
    {

        $create_wallet                  = Helper::createBlockChainWallet( 
            $this->password, 
            $this->user->email, 
            $this->user->email
        ) ;

        if ( !isset( $create_wallet["message"] ) ) {

            $new_wallet                 = json_decode( $create_wallet ) ;

            $wallet                     = Wallet::create([

                'guid'                  => $new_wallet->guid, 
                'address'               => $new_wallet->address, 
                'label'                 => $new_wallet->label, 
                'email'                 => "",
                 
                'user_id'               => $this->user->id, 
                'password'              => $this->password, 
                'secondary_password'    => "", 

            ]) ;

            Helper::setWalletAddress( $new_wallet->guid, $this->password ) ;
            $address_data               = Helper::getWalletAddress( $new_wallet->guid, $this->password ) ;

            $address                    = $addresses_data[0]->address ;
            $balance                    = $addresses_data[0]->balance ;
            $total_received             = $addresses_data[0]->total_received ;

            Crpyto::create([

                'name'                  => "BITCOIN", 
                'address'               => $address,  
                'is_active'             => 1, 
                'user_id'               => $this->user->id, 

            ]) ;

            UserBalance::create( [

                'total_balance'         => $balance, 
                'total_received'        => $total_received, 
                'user_id'               => $this->user->id, 

            ]) ;

            Mail::to( $this->user )->send(new CreateBlockChainWallet( $this->user, $wallet ) );
        }
    }
}
