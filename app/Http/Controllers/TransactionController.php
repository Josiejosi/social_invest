<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\Transaction ;

use App\Models\User ;

use Carbon\Carbon ;

class TransactionController extends Controller
{

	public function __construct() { $this->middleware('auth') ; }

    public function index() {

    	return view( "backend.transactions", Helper::PageBuilder( "Transactions" ) ) ;

    }

    public function list_transactions() {

    	return Helper::getLatestDonations() ;

    }

    
}
