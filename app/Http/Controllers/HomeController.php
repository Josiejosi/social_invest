<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

class HomeController extends Controller
{
    public function index() {

        if ( auth()->user()->is_verified == 0 ) {
            return redirect('/verification') ;
        }

        if ( auth()->user()->is_avtive == 1 ) {
            return redirect('/blocked') ;
        }
    	
    	return view( "backend.index", Helper::PageBuilder( "Home" ) ) ;
    }
}
