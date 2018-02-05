<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

class MessageController extends Controller
{
    public function index() {
    	return view( "backend.message", Helper::PageBuilder( "Messages" ) ) ;
    }
}
