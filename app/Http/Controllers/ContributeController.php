<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\Transaction ;

use App\Jobs\CompleteTransactionJob ;

use Carbon\Carbon ;

class ContributeController extends Controller
{

    public function __construct() { $this->middleware('auth') ; }

    public function index( $transaction_id ) {

    	$transaction 						= Transaction::find( $transaction_id ) ;

    	return view( "backend.contribute", Helper::PageBuilder( "Contribution", $transaction ) ) ;
    }

    public function confirm_contribution( $transaction_id ) {

        $transaction                        = Transaction::find( $transaction_id ) ;

        $transaction_url                    = url('/complete_contribution/') . "/" . $transaction->id ;

    	$transaction->update([
    		"status" 						=> 1,
    		"donar_id" 						=> auth()->user()->id,
    	]) ;

        CompleteTransactionJob::dispatch( auth()->user(), $transaction_url )->onQueue('CompleteTransaction');

		flash('Your have successfully confirmed to have made a transaction, once a the party confirms you will be schedule for a donation in the next 7 days, if the party fails to confirm in the next 24 hours the entry will return to the list.')->info() ;
		return redirect('/home') ;
    }

    public function complete_contribution($transaction_id) {

    	$transaction 						= Transaction::find( $transaction_id ) ;

    	$transaction->update([
    		"status" 						=> 2,
    	]) ;

    	$donee_id 							= $transaction->donar_id ;
    	$amount 							= $transaction->growth_amount ;
    	$deposit_type 						= $transaction->deposit_type ;

	    $transaction_reference_code 		= strtoupper( str_random(10) ) ;
    	$status 							= 0 ;

    	$donar_id 							= 0 ;

    	$maturity_months 					= Helper::getMaxPaymentDays() ;

    	$growth_percentage 					= Helper::getGrowthPercentage() ;

    	$percentage 						= ( $maturity_months * $growth_percentage ) / 100 ;

    	$growth_amount 						= round( ( $amount * $percentage ) + $amount, 2 ) ;

    	$level 								= Helper::getUserLevel( $donee_id ) ;

    	$transaction 						= Transaction::create([

	        'transaction_reference_code'	=> $transaction_reference_code, 
	        'amount'						=> $amount, 
	        'growth_amount'					=> $growth_amount, 
	        'payday'						=> Carbon::now()->addDays($maturity_months), 
	        'deposit_type'					=> $deposit_type, 
	        'level'							=> $level, 
	        'status'						=> $status,  
	        'donar_id'						=> $donar_id, 
	        'donee_id'						=> $donee_id, 

    	]) ;

		flash('You have successfully completed this transaction.')->info() ;
		return redirect('/home') ;	
    }
}
