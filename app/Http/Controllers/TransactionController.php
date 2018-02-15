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

    	$transactions 						= Transaction::whereDonarId( auth()->user()->id )
    													 ->whereDoneeId( auth()->user()->id )
    													 ->get() ;

    	return view( "backend.transactions", Helper::PageBuilder( "Transactions", $transactions ) ) ;

    }

    
}
