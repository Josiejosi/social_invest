<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\Wallet ;
use App\Models\User ;

use App\Jobs\CreateWalletJob ;

class WalletController extends Controller
{
	public function __construct() { $this->middleware('auth') ; }

    public function index() {

    	$wallet                    = ( User::find( auth()->user()->id ) )->wallet ;

        $balance                   = 0 ;

        if ( count( $wallet ) > 0 ) {

            $balance                = Helper::getWalletBalance( $wallet->password, $wallet->guid ) ;

            if ( isset( $balance["message"] ) ) {
                flash( $balance["message"] )->success() ;
            }

        }

        $data                       = [
            'wallet'                => $wallet,
            'balance'               => $balance,
            "referral_points"       => Helper::getReferralPoints( auth()->user()->id ),
        ] ;

    	return view( "backend.blockchainwallet", Helper::PageBuilder( "BlockChain Wallet", $data ) ) ;

    }

    public function create_wallet( Request $request ) {

	    CreateWalletJob::dispatch( auth()->user(), str_random(10) )->onQueue('CreateWallet') ;

		flash('Wallet creation was successful, please check again in a few seconds.')->success() ;
		return redirect()->back() ;

    }

    public function make_payment( Request $request ) {

        if ( Wallet::where( 'user_id', auth()->user()->id )->count() > 0 ) {

            $wallet                    = ( User::find( auth()->user()->id ) )->wallet ;

            if ( count( $wallet ) > 0 ) {

                $balance                = Helper::getWalletBalance( $wallet->password, $wallet->guid ) ;

                if ( isset( $balance["message"] ) ) {

                    flash( $balance["message"] )->info() ;

                } else {

                    $make_payment             = Helper::makePayment( 
                        $wallet->guid, 
                        $wallet->password, 
                        $request->address, 
                        $request->amount 
                    ) ;
                    flash( $make_payment )->info() ;
                }

            } else {

                flash( "You have not created any wallets." )->info() ;

            }           

        }

        
        return redirect()->back() ;       

    }
}
