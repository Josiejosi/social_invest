<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\Setting ;

class SettingsController extends Controller
{
    
    public function __construct() { $this->middleware('auth') ; }

    public function index() {

    	return view( "backend.settings", Helper::PageBuilder( "Settings", Setting::first() ) ) ;

    }

    public function settings( Request $request ) {

    	$settings 							= ( Setting::first() )->update([

    		"max_daily_users" 				=> $request->max_daily_users,
    		"max_daily_donations" 			=> $request->max_daily_donations,
    		"useless_user_days" 			=> $request->useless_user_days,
    		"max_payment_days" 				=> $request->max_payment_days,
            "max_confirmed_donations"       => $request->max_confirmed_donations,
    		"growth_percentage" 		    => $request->growth_percentage,

            //New settings
            //

            "donation_list_active"          => $request->donation_list_active,
            "support_active"                => $request->support_active,
            "show_update_users"             => $request->show_update_users,
            "update_message"                => $request->update_message,
            "realtime_delay"                => $request->realtime_delay,
            "amount_allowed_split"          => $request->amount_allowed_split,
            
    	]) ;

    	flash( "Donation settings successfully updated." )->success() ;

    	return redirect()->back() ;

    }

}
