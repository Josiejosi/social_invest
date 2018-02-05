<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

class HomeController extends Controller
{
    public function index() {
    	return view( "backend.index", Helper::PageBuilder( "Home" ) ) ;
    }
}
