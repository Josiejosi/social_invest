<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

class SupportController extends Controller
{

	public function __construct() { $this->middleware('auth') ; }

    public function index() {


    	return view( "support.index", Helper::PageBuilder( "Support" ) ) ;

    }

}
