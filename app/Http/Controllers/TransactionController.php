<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

class TransactionController extends Controller
{

	public function __construct() { $this->middleware('auth') ; }

    public function index() {
    	return view( "backend.transactions", Helper::PageBuilder( "Transactions" ) ) ;
    }
    
}
