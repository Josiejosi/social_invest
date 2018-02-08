<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\Dream ;

class HomeController extends Controller
{
    public function __construct() { $this->middleware('auth') ; }

    public function index() {
    	
    	return view( "backend.index", Helper::PageBuilder( "Home" ) ) ;
    }

    public function create_a_dream( Request $request ) {


    }
}
