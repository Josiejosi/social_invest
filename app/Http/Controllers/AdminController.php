<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\User ;
use App\Models\RoleUser ;
use App\Models\Transaction ;

use App\Jobs\CompleteTransactionJob ;


use Carbon\Carbon ;

class AdminController extends Controller
{

    public function __construct() { $this->middleware('auth') ; }

    public function block() {
    	
    	$users 							= User::all() ;

    	return view( "admin.block", Helper::PageBuilder( "Block", $users ) ) ;

    }

    public function donation() {
        
        $users                          = User::all() ;

        return view( "admin.donation", Helper::PageBuilder( "New Admin Donation", $users ) ) ;

    }

    public function member() {
        
        $users                          = User::all() ;

        return view( "admin.member", Helper::PageBuilder( "New Admin Member", $users ) ) ;

    }

    public function admin_member( Request $request ) {
        
        ( RoleUser::whereUserId($request->user_id)->first() )->update(["role_id"=>2]) ;

        flash( "Member successfully upgraded to admin." )->success() ;
        return redirect()->back() ;

    }

    public function post_donation( Request $request ) {


	    $transaction_reference_code 		= strtoupper( str_random(10) ) ;
    	$status 							= 0 ;

    	$donar_id 							= 0 ;
    	$donee_id 							= $request->donee_id ;

    	$amount 							= $request->amount ;

    	$maturity_months 					= Helper::getMaxPaymentDays() ;

    	$growth_percentage 					= Helper::getGrowthPercentage() ;

    	$percentage 						= ( $maturity_months * $growth_percentage ) / 100 ;

    	$growth_amount 						= round( ( $amount * $percentage ) + $amount, 2 ) ;

    	$level 								= Helper::getUserLevel( $donee_id ) ;

    	$transaction 						= Transaction::create([

	        'transaction_reference_code'	=> $transaction_reference_code, 
	        'amount'						=> $amount, 
	        'growth_amount'					=> $growth_amount, 
	        'payday'						=> Carbon::now()->subDays($maturity_months), 
	        'deposit_type'					=> $request->deposit_type, 
	        'level'							=> $level, 
	        'status'						=> $status,  
	        'donar_id'						=> $donar_id, 
	        'donee_id'						=> $donee_id, 

    	]) ;

    	flash( "Donation successfully created." )->success() ;
    	return redirect()->back() ;

    }

    public function block_user($user_id) {
    	$user = ( User::find( $user_id ) )->update(['is_avtive'=>0]) ;

    	flash( "User successfully blocked." )->success() ;

    	return redirect()->back() ;

    }

}
