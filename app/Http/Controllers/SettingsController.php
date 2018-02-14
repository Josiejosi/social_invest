<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\Setting ;

class SettingsController extends Controller
{
    
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

    	return view( "backend.settings", Helper::PageBuilder( "Settings" ) ) ;

    }

    public function settings( Request $request ) {

    	$settings 							= ( Setting::first() )->update([
    		"max_daily_users" 				=> $request->max_daily_users,
    		"max_daily_donations" 			=> $request->max_daily_donations,
    		"useless_user_days" 			=> $request->useless_user_days,
    		"max_payment_days" 				=> $request->max_payment_days,
            "max_confirmed_donations"       => $request->max_confirmed_donations,
    		"growth_percentage" 		    => $request->growth_percentage,
    	]) ;

    	flash( "Donation settings successfully updated." )->success() ;

    	return redirect()->back() ;

    }

}
