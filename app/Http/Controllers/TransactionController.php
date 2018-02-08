<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\Transaction ;

use App\Models\Dream ;

class TransactionController extends Controller
{

	public function __construct() { $this->middleware('auth') ; }

    public function index() {

    	$user_id 							= auth()->user()->id ;

    	$dreams 							= Dream::select('id')->whereUserId( $user_id )->get() ;

    	$dream_transaction 					= Transaction::whereIn( 'dream_id', $dreams )->get() ;
    	$donar_transaction 					= Transaction::whereDonarId( $user_id )->get() ;

    	$transactions 						= $dream_transaction->merge( $donar_transaction ) ;

    	return view( "backend.transactions", Helper::PageBuilder( "Transactions", $transactions ) ) ;

    }


    
}
