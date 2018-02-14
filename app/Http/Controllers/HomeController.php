<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\User ;
use App\Models\Dream ;
use App\Models\LevelUser ;
use App\Models\Transaction ;

use Carbon\Carbon ;

class HomeController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

    	$user_id 							= auth()->user()->id ;
    	
        $user_dreams                        = Dream::whereUserId( $user_id )->get() ;
    	$transactions 						= Transaction::all() ;

    	return view( "backend.index", Helper::PageBuilder( "Home", $transactions ) ) ;
    }

    public function create_a_dream( Request $request ) {

	    $validated 							= $request->validate([

            'name' 							=> 'required',
            'amount' 						=> 'required|numeric',
            'deposit_type' 					=> 'required',
            'months'  						=> 'required',

	    ]);

	    $user_id 							= auth()->user()->id ;

    	$amount 							= $request->amount ;
    	$maturity_months 					= $request->months ;

    	$percentage 						= ( $maturity_months * 75 ) / 100 ;

    	$growth_amount 						= round( ( $amount * $percentage ) + $amount, 2 ) ;

    	$level 								= Helper::getUserLevel( $user_id ) ;

    	$dream 								= Dream::create([

	        'name'							=> $request->name, 
	        'amount'						=> $amount, 
	        'growth_amount'					=> $growth_amount, 
	        'payday'						=> Carbon::now()->addMonths( $maturity_months )->toDateString(), 
	        'level'							=> $level, 
	        'deposit_type'					=> $request->deposit_type, 
	        'user_id'						=> $user_id, 

    	]) ;

    	if ( $dream ) {

	    	$transaction_reference_code 	= strtoupper( str_random(10) ) ;
	    	$status 						= 0 ;

	    	$donar_id 						= 0 ;

	    	$transaction 					= Transaction::create([

		        'transaction_reference_code'=> $transaction_reference_code, 
		        'amount'					=> $amount, 
		        'level'						=> $level, 
		        'status'					=> $status, 
		        'dream_id'					=> $dream->id, 
		        'donar_id'					=> $donar_id, 

	    	]) ;

	    	if ( $transaction ) 
	    		flash( "A new dream was completed successfully." )->success() ;

    	} else {

    		flash( "Something happed while creating a new dream, please try again late." )->warning() ;

    	}

    	return redirect()->back() ;

    }
}
