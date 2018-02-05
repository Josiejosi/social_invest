<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

class FrontController extends Controller
{
    public function index() {
    	return view( "frontend.index", Helper::PageBuilder( "Home" ) ) ;
    }
}
