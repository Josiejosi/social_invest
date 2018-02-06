<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\User ;
use App\Models\Crpyto ;
use App\Models\Account ;

use App\Jobs\WelcomeEmailJob;


class FrontController extends Controller
{
    public function index() {
    	$crypto_rate = Helper::getCryptoData() ;
    	return view( "frontend.index", Helper::PageBuilder( "Home", ["crypto_rate"=>$crypto_rate] ) ) ;
    }
    public function join() {
    	return view( "frontend.join", Helper::PageBuilder( "Join now" ) ) ;
    }

    public function register( Request $request ) {

	    $validated 					= $request->validate([

            'email' 				=> 'required|unique:users|email',
            'cell_phone_number' 	=> 'required|unique:users|numeric',
            'name' 					=> 'required',
            'account_number'  		=> 'unique:accounts',
            'password'  			=> 'required:confirmed',

	    ]);

/*	    $validated->after(function ($validated) {

	        if ( isset( $request->bitcoin_address ) ) {

	        	if ( Crpyto::whereAddress( $request->bitcoin_address )->count() ) {

	            	$validated->errors()->add('bitcoin_address', 'Sorry, this bitcoin address is already taken.') ;
	            	
	        	}

	        }

	        if ( isset( $request->ethereum_address ) ) {

	        	if ( Crpyto::whereAddress( $request->ethereum_address )->count() ) {

	            	$validated->errors()->add('ethereum_address', 'Sorry, this ethereum address is already taken.') ;

	        	}

	        }

	    });*/

	    //$remember 						= $request->name ;


	    $user 							= User::create([
	        'name'						=> $request->name, 
	        'email'						=> $request->email, 
	        'password'					=> bcrypt( $request->password ), 
	        'surname'					=> $request->surname, 
	        'cell_phone_number'			=> $request->cell_phone_number, 
	        'country'					=> "RSA", 
	        'is_verified'				=> 0, 
	        'verification_code'			=> rand( 111111, 999999 ), 
	        'referral_code'				=> rand( 111111, 999999 ), 
	        'is_avtive'					=> 0, 
	        'avatar'					=> 'None', 
	        'is_online'					=> 0, 
	    ]) ;

	    $is_bank_account_set = false ;

	    if ( isset( $request->bank_name ) && isset( $request->account_number ) && isset( $request->branch_code ) ) {
	    	Account::create([
		        'bank_name'				=> $request->bank_name, 
		        'account_number'		=> $request->account_number, 
		        'branch_code'			=> $request->branch_code, 
		        'is_active'				=> 1, 
		        'user_id'				=> $user->id, 
	    	]) ;

	    	$is_bank_account_set = true ;
	    }

	    $is_bitcoin_set = false ;

	    if ( isset( $request->bitcoin_address ) ) {
	    	Crpyto::create([
		        'name'					=> "BITCOIN", 
		        'address'				=> $request->bitcoin_address,  
		        'is_active'				=> 1, 
		        'user_id'				=> $user->id, 
	    	]) ;

	    	$is_bitcoin_set = true ;
	    }

	    $is_ethereum_set = false ;

	    if ( isset( $request->ethereum_address ) ) {
	    	Crpyto::create([
		        'name'					=> "ETHEREUM", 
		        'address'				=> $request->ethereum_address,  
		        'is_active'				=> 1, 
		        'user_id'				=> $user->id, 
	    	]) ;

	    	$is_ethereum_set = true ;
	    }

	    WelcomeEmailJob::dispatch( $user )->onQueue('WelcomeEmail');

	    if ( auth()->attempt( ['email' => $request->email, 'password' => $request->password] ) ) {
    		flash('Your account was successfully created, an email was send to you with a verification code.')->success() ;
    		return redirect('/verification') ;
    	} else {
	    	flash( 'Sorry something went wrong, will resolve it and get back to you.' )->warning() ;
	    	return redirect()->back() ;
    	}
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



    public function login_post( Request $request ) {

	    if ( auth()->attempt( ['email' => $request->email, 'password' => $request->password], $request->remember_me ) ) {

	        if ( auth()->user()->is_verified == 0 ) {
	            return redirect('/verification') ;
	        }

	        if ( auth()->user()->is_avtive == 1 ) {
	            return redirect('/blocked') ;
	        }

    		flash('Your have successfully logged in.')->success() ;
    		return redirect('/home') ;
    	} else {
	    	flash( 'Wrong combination, please try with valid credentials.' )->warning() ;
	    	return redirect()->back() ;
    	}

    }

    public function faq() {
    	return view( "frontend.faq", Helper::PageBuilder( "FAQ" ) ) ;
    }

    public function forgot_password() {
    	return view( "frontend.forgot_password", Helper::PageBuilder( "Forgot Password" ) ) ;
    }

    public function verification() {
    	return view( "frontend.verification", Helper::PageBuilder( "Verify Account" ) ) ;
    }

    public function post_verification( Request $request ) {
    	
    	if ( auth()->user()->verification_code == $request->verification_code ) {
    		User::find( auth()->user()->id )->update( ['is_verified' => 1 ] ) ;
    		flash( 'Your account verification was successfully, You can now create a Dream' )->info() ;
    		return redirect('/home') ;
    	} else {
	    	flash( 'Wrong Verification Code, Please provide a valid code.' )->warning() ;
	    	return redirect()->back() ;    		
    	}

    }

    public function logout() {
    	auth()->logout() ;
    	return redirect('/') ;
    }

}
