<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\User ;
use App\Models\Crpyto ;
use App\Models\Account ;

class ProfileController extends Controller
{

	public function __construct() { $this->middleware('auth') ; }
	
    public function index() {


    	return view( "backend.profile", Helper::PageBuilder( "Profile" ) ) ;

    }

    public function update_display_name( Request $request ) {
    	$user 						= User::find(auth()->user()->id)->update([
    		'name'					=> $request->name,
    		'surname'				=> $request->surname,
    	]) ;

    	if ( $user )
    		flash( "Display Name successfully updated." )->success() ;
    	else
    		flash( "Display Name update failed." )->warning() ;

    	return redirect()->back() ;
    }

    public function update_password( Request $request ) {

	    $validated 					= $request->validate([

            'password'  			=> 'required:confirmed|min:6|max:12',

	    ]);

    	$user 						= User::find(auth()->user()->id)->update([
    		'password'				=> bcrypt( $request->password ),
    	]) ;

    	if ( $user ) {
	    	flash( "Password successfully changed, Please login with your new password." )->success() ;
	    	auth()->logout() ;
	    	return redirect('/login') ;
    	} else {
    		flash( "Failed to update password." )->warning() ;
    		return redirect()->back() ;
    	} 	
    }

    public function update_payment_details( Request $request ) {

    	if ( Account::whereUserId( auth()->user()->id )->count() == 0 ) {
		    $validated 					= $request->validate([

	            'account_number'  		=> 'unique:accounts',

		    ]);
		}

	    if ( isset( $request->bank_name ) && isset( $request->account_number ) && isset( $request->branch_code ) ) {

	    	if ( Account::whereUserId( auth()->user()->id )->count() == 1 ) {
		    	Account::whereUserId( auth()->user()->id )->update([

			        'bank_name'			=> $request->bank_name, 
			        'account_number'	=> $request->account_number, 
			        'branch_code'		=> $request->account_number, 

		    	]) ;
		    	flash( "Bank account was successfully updated." )->success() ;
	    	} else {
		    	Account::create([

			        'bank_name'			=> $request->bank_name, 
			        'account_number'	=> $request->account_number, 
			        'branch_code'		=> $request->account_number, 
			        'user_id'			=> auth()->user()->id,
			        'is_active'			=> 1,

		    	]) ;
		    	flash( "Bank account was successfully added to profile." )->success() ;	    		
	    	}
	    }

	    if ( isset( $request->bitcoin_address ) ) {

	    	if ( Crpyto::whereUserId( auth()->user()->id )->whereName( "BITCOIN" )->count() == 1 ) {

	    		Crpyto::whereUserId( auth()->user()->id )->whereName( "BITCOIN" )->update([

	    			'address'			=> $request->bitcoin_address,

	    		]) ;
	    		flash( "Your BITCOIN Address was successfully updated." )->success() ;

	    	} else {
	    		Crpyto::create([

	    			'name'				=> "BITCOIN",
	    			'address'			=> $request->bitcoin_address,
			        'user_id'			=> auth()->user()->id,
			        'is_active'			=> 1,

	    		]) ;
	    		flash( "Your BITCOIN Address was successfully added to profile." )->success() ;
	    	}

	    }

	    if ( isset( $request->ethereum_address ) ) {

	    	if ( Crpyto::whereUserId( auth()->user()->id )->whereName( "ETHEREUM" )->count() == 1 ) {

	    		Crpyto::whereUserId( auth()->user()->id )->whereName( "ETHEREUM" )->update([

	    			'address'			=> $request->ethereum_address,

	    		]) ;
	    		flash( "Your ETHEREUM Address was successfully updated." )->success() ;

	    	} else {
	    		Crpyto::create([

	    			'name'				=> "ETHEREUM",
	    			'address'			=> $request->ethereum_address,
			        'user_id'			=> auth()->user()->id,
			        'is_active'			=> 1,

	    		]) ;
	    		flash( "Your ETHEREUM Address was successfully added to profile." )->success() ;
	    	}
	    	
	    }

	    return redirect()->back() ;

    }
}
