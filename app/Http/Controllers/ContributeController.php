<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\Btc ;
use App\Models\Eth ;
use App\Models\User ;
use App\Models\Transaction ;
use App\Models\TransactionSplit ;

use App\Jobs\CompleteTransactionJob ;

use Carbon\Carbon ;

use App\Events\LatestTransactions ;

class ContributeController extends Controller
{

    public function __construct() { $this->middleware('auth') ; }

    public function index( $transaction_id ) {

        $transaction                        = Transaction::find( $transaction_id ) ;

        $transaction->update([

            "status"                        => 1,

        ]) ;

        $donee                              = User::find( $transaction->donee_id ) ;

        $crypto                             = Helper::getCurrentCryptoAddresses( $donee ) ;

        $qrcode_string                      = "" ;

        if ( !isset( $crypto[ "btc" ] ) || !isset( $crypto[ "eth" ] ) ) {
            $qrcode_string                  = false ;
        }

        if ( isset( $crypto[ "btc" ] ) ) {
            $qrcode_string                  .= "BTC: " . $crypto[ "btc" ] . "," ;
        }

        if ( isset( $crypto[ "eth" ] ) ) {
            $qrcode_string                  .= " ETH: " . $crypto[ "eth" ] . "," ;
        }

        $amount                             = $transaction->growth_amount ;

        $data                               = [
            'transaction'                   => $transaction,
            'amount'                        => $amount,
            'type'                          => 'Full',
            'btc_address'                   => $crypto[ "btc" ],
            'btc_amount'                    => $amount / Helper::getBtcLatestAmount(),
            'eth_address'                   => $crypto[ "eth" ],
            'eth_amount'                    => $amount / Helper::getEthLatestAmount(),
            'donee'                         => $donee,
            'qrcode_string'                 => $qrcode_string,
        ] ;

        event( new LatestTransactions( Helper::getLatestDonations() ) ) ;

        return view( "backend.contribute", Helper::PageBuilder( "Contribution", $data ) ) ;
    }

    public function contribute_amount( $transaction_id, $amount ) {

        $transaction                        = Transaction::find( $transaction_id ) ;

        $transaction->update([

            "status"                        => 1,

        ]) ;

        $donee                              = User::find( $transaction->donee_id ) ;

        $crypto                             = Helper::getCurrentCryptoAddresses( $donee ) ;

        $qrcode_string                      = "" ;

        if ( !isset( $crypto[ "btc" ] ) || !isset( $crypto[ "eth" ] ) ) {
            $qrcode_string                  = false ;
        }

        if ( isset( $crypto[ "btc" ] ) ) {
            $qrcode_string                  .= "BTC: " . $crypto[ "btc" ] . "," ;
        }

        if ( isset( $crypto[ "eth" ] ) ) {
            $qrcode_string                  .= " ETH: " . $crypto[ "eth" ] . "," ;
        }

        $data                               = [
            'transaction'                   => $transaction,
            'amount'                        => $amount,
            'type'                          => 'split',
            'btc_address'                   => $crypto[ "btc" ],
            'btc_amount'                    => $amount / Helper::getBtcLatestAmount(),
            'eth_address'                   => $crypto[ "eth" ],
            'eth_amount'                    => $amount / Helper::getBtcLatestAmount(),
            'donee'                         => $donee,
            'qrcode_string'                 => $qrcode_string,
        ] ;

        event( new LatestTransactions( Helper::getLatestDonations() ) ) ;

        return view( "backend.contribute", Helper::PageBuilder( "Contribution", $data ) ) ;
    }

    public function select_contribution( $transaction_id ) {

    	$transaction 						= Transaction::find( $transaction_id ) ;

        $transaction_split                  = TransactionSplit::where( 'transaction_id', $transaction_id )->get() ;

        $data                               = [
            'transaction'                   => $transaction,
            'transaction_split'             => $transaction_split,
            'allowed_for_split'             => Helper::getAmountAllowedForSplitting(),
        ] ;

        if ( $transaction->growth_amount <= Helper::getAmountAllowedForSplitting() ) {

            return redirect( "/contribute/" . $transaction->id ) ;

        } else {

            return view( 

                        "backend.select_contribution", 
                        
                        Helper::PageBuilder( 
                            "How would you like to make a contribution", 
                            $data 
                        ) 

                    ) ;

        }

    }

    public function just_view_contribution( $transaction_id ) {

        $transaction                        = Transaction::find( $transaction_id ) ;

        if ( count( $transaction ) > 0 ) {

            if ( $transaction->status == 1 ) {

                $transaction->update([

                    "status"                        => 0,

                ]) ;

                event( new LatestTransactions( Helper::getLatestDonations() ) ) ;

            }

        }

    }

    public function confirm_contribution( $transaction_id ) {

        Helper::setUserDailyDonationLimit( auth()->user()->id ) ;

        $transaction                        = Transaction::find( $transaction_id ) ;

        $transaction_url                    = url('/complete_contribution/') . "/" . $transaction->id ;

        $transaction->update([
            "status"                        => 2,
            "donar_id"                      => auth()->user()->id,
        ]) ;


        event( new LatestTransactions( Helper::getLatestDonations() ) ) ;

        CompleteTransactionJob::dispatch( 
            User::find($transaction->donar_id), //name is this dude. sender
            User::find($transaction->donee_id), //message to reeiver
            $transaction_url, 
            $transaction->growth_amount
        )->onQueue('CompleteTransaction');

        flash('Your have successfully confirmed to have made a transaction, once a the party confirms you will be schedule for a donation in the next 7 days, if the party fails to confirm in the next 24 hours the entry will return to the list.')->info() ;
        return redirect('/home') ;
    }

    public function confirm_split( $transaction_id, $amount ) {

        Helper::setUserDailyDonationLimit( auth()->user()->id ) ;

        $transaction                        = Transaction::find( $transaction_id ) ;

        $transaction_url                    = url('/complete_contribution/') . "/" . $transaction->id ;

    	$transaction->update([
    		"status" 						=> 0,
            "donar_id"                      => auth()->user()->id,
    		"growth_amount" 				=> $transaction->growth_amount - $amount, //minus the provided amount.
    	]) ;

        TransactionSplit::create([

            'donation_amount'               => $amount, 
            'outstanding_amount'            => $transaction->growth_amount - $amount, 
            'user_id'                       => auth()->user()->id, 
            'transaction_id'                => $transaction_id,

        ]) ;

        event( new LatestTransactions( Helper::getLatestDonations() ) ) ;

        CompleteTransactionJob::dispatch( 
            User::find($transaction->donar_id), //name is this dude. sender
            User::find($transaction->donee_id), //message to reeiver
            $transaction_url, 
            $amount 
        )->onQueue('CompleteTransaction');

		flash('Your have successfully confirmed to have made a transaction, once a the party confirms you will be schedule for a donation in the next 7 days, if the party fails to confirm in the next 24 hours the entry will return to the list.')->info() ;
		return redirect('/home') ;
    }

    public function complete_contribution($transaction_id) {

    	$transaction 						= Transaction::find( $transaction_id ) ;

        $count_splites                      = TransactionSplit::where( 'transaction_id', $transaction_id )->count() ;

        if ( $count_splites > 0 ) {
            
            $splites                        = $transaction->growth_amount ;

            if ( $splites <= 0 ) {
                $transaction->update([
                    "status"                => 3,
                ]) ;                
            } else {
                $transaction->update([
                    "status"                => 5,
                ]) ;                
            }

        } else {
            $transaction->update([
                "status"                    => 3,
            ]) ;
        }


    	$donee_id 							= $transaction->donar_id ;
    	$amount 							= $transaction->growth_amount ;
    	$deposit_type 						= $transaction->deposit_type ;

	    $transaction_reference_code 		= strtoupper( str_random(10) ) ;
    	$status 							= 0 ;

    	$donar_id 							= 0 ;

    	$maturity_months 					= Helper::getMaxPaymentDays() ;

    	$growth_percentage 					= Helper::getGrowthPercentage() ;

    	$percentage 						= $growth_percentage / 100 ;

    	$growth_amount 						= round( ( $amount * $percentage ) + $amount, 2 ) ;

    	$level 								= Helper::getUserLevel( $donee_id ) ;

    	$transaction 						= Transaction::create([

	        'transaction_reference_code'	=> $transaction_reference_code, 
	        'amount'						=> $amount, 
	        'growth_amount'					=> $growth_amount, 
	        'payday'						=> Carbon::now()->subDays($maturity_months),//->addDays($maturity_months), 
	        'deposit_type'					=> $deposit_type, 
	        'level'							=> $level, 
	        'status'						=> $status,  
	        'donar_id'						=> $donar_id, 
	        'donee_id'						=> $donee_id, 

    	]) ;

        event( new LatestTransactions( Helper::getLatestDonations() ) ) ;

		flash('You have successfully completed this transaction.')->info() ;
		return redirect('/home') ;	
    }
}
