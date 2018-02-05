<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

class ProfileController extends Controller
{
    public function index() {
    	return view( "backend.profile", Helper::PageBuilder( "Profile" ) ) ;
    }
}
