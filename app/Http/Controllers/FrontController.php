<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

class FrontController extends Controller
{
    public function index() {
    	$crypto_rate = Helper::getCryptoData() ;
    	return view( "frontend.index", Helper::PageBuilder( "Home", ["crypto_rate"=>$crypto_rate] ) ) ;
    }
    public function join() {
    	return view( "frontend.join", Helper::PageBuilder( "Join now" ) ) ;
    }
    public function calculator() {
    	$crypto_rate = Helper::getCryptoData() ;
    	return view( "frontend.calculator", Helper::PageBuilder( 
    			"Get an accurate figure for your investment", ["crypto_rate"=>$crypto_rate] 
    		) 
    	) ;
    }
    public function login() {
    	return view( "frontend.login", Helper::PageBuilder( "Login to the platform" ) ) ;
    }
    public function faq() {
    	return view( "frontend.faq", Helper::PageBuilder( "FAQ" ) ) ;
    }
    public function forgot_password() {
    	return view( "frontend.forgot_password", Helper::PageBuilder( "Forgot Password" ) ) ;
    }
    public function logout() {
    	auth()->logout() ;
    	return redirect('/') ;
    }

}
