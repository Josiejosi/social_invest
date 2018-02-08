<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\User ;
use App\Models\Role ;
use App\Models\Level ;
use App\Models\Crpyto ;
use App\Models\Account ;
use App\Models\Referral ;
use App\Models\RoleUser ;
use App\Models\LevelUser ;

use App\Jobs\WelcomeEmailJob;
use App\Jobs\ResetPasswordJob;
use App\Jobs\ResendVerificationCodeJob;


class FrontController extends Controller
{
    public function index() {
    	$crypto_rate = Helper::getCryptoData() ;
    	return view( "frontend.index", Helper::PageBuilder( "Home", ["crypto_rate"=>$crypto_rate] ) ) ;
    }
    public function join() {
        return view( "frontend.join", Helper::PageBuilder( "Join" ) ) ;
    }

    public function join_by_referral( $referral_code ) {

        $referral_code              = [
            'referral_code'         => $referral_code,
        ] ;

    	return view( "frontend.join", Helper::PageBuilder( "Join", $referral_code ) ) ;
    }

    public function register( Request $request ) {

	    $validated 					= $request->validate([

            'email' 				=> 'required|unique:users|email',
            'cell_phone_number' 	=> 'required|unique:users|numeric',
            'name' 					=> 'required',
            'account_number'  		=> 'unique:accounts',
            'password'  			=> 'required:confirmed|min:6|max:12',

	    ]);


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

        $level                          = Level::whereLevel(1)->first() ;

        $role                           = Role::whereName("member")->first() ;

        LevelUser::create([

            'user_id'                   => $user->id, 
            'level_id'                  => $level->id, 

        ]) ;

        RoleUser::create([

            'user_id'                   => $user->id, 
            'role_id'                   => $role->id, 

        ]) ;

        if ( isset( $request->referral_code ) ) {

            $refera                     = User::whereReferralCode( $request->referral_code )->first() ;

            Referral::create([

                'referral_by'           => $refera->id, 
                'referral_to'           => $user->id, 
                'is_referred'           => true, 

            ]) ;
        }

	    WelcomeEmailJob::dispatch( $user )->onQueue('WelcomeEmail') ;

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

    public function post_forgot_password( Request $request ) {

        
        if ( User::whereEmail($request->email)->count() == 1 ) {

           $user = User::whereEmail($request->email)->first() ; 

            ResetPasswordJob::dispatch( $user )->onQueue('ResetPassword');
            
            flash( 'An email with your verification code was successfully send to you.' )->info() ;

            return redirect()->back() ;

        } else {
            flash( 'Sorry your email address does not match any of our records.' )->warning() ;
            return redirect()->back() ;
        }
        


    }

    public function reset_password() {
        return view( "frontend.reset_password", Helper::PageBuilder( "Forgot Password" ) ) ;
    }

    public function post_reset_password( Request $request ) {

        if ( User::whereEmail($request->email)->count() == 1 ) {

            if ($request->password == $request->password ) {
                User::whereEmail($request->email)->update(['password' => bcrypt($request->password)]) ; 
                flash( 'You password was successfully reset.' )->info() ;     
            } else {
                flash( 'Please confirm password.' )->warning() ;
            }

        } else {
            flash( 'Sorry your email address does not match any of our records.' )->warning() ;
            
        }

        return redirect()->back() ;

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

    public function blocked() {
    	return view( "frontend.blocked", Helper::PageBuilder( "Blocked Account" ) ) ;
    }

    public function resend_verification_code() {

        ResendVerificationCodeJob::dispatch( auth()->user() )->onQueue('ResendVerificationCodeEmail');
        
        flash( 'An email with your verification code was successfully send to you.' )->info() ;

        return redirect()->back() ;
    }

    public function logout() {
    	auth()->logout() ;
    	return redirect('/') ;
    }

}
