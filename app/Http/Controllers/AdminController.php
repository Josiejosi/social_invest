<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Helpers\Helper ;

use App\Models\User ;
use App\Models\RoleUser ;
use App\Models\Transaction ;

use App\Jobs\CompleteTransactionJob ;

use App\Events\LatestTransactions ;


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

    	Transaction::create([

	        'transaction_reference_code'	=> $transaction_reference_code, 
	        'amount'						=> $amount, 
	        'growth_amount'					=> $amount, 
	        'payday'						=> Carbon::now()->subDays($maturity_months), 
	        'deposit_type'					=> $request->deposit_type, 
	        'level'							=> $level, 
	        'status'						=> $status,  
	        'donar_id'						=> $donar_id, 
	        'donee_id'						=> $donee_id, 

    	]) ;

        $transactions                       = Transaction::where( 'status', '<>', 3 )->get() ;


        $now                                = Carbon::now() ;

        $build_transactions             = [] ;

        if ( count( $transactions ) > 0 ) {

            foreach ( $transactions as $transaction ) {

                if ( ( $transaction->payday )->diffInDays( $now ) >= 7 ) {

                    $build_transactions[]   =  [

                        'name'              => $transaction->donee->name . " " . $transaction->donee->surname ,
                        'status'            => $transaction->status,
                        'deposit_type'      => $transaction->deposit_type,
                        'growth_amount'     => $transaction->growth_amount,
                        'url'               => url( "/" . "contribute" . "/" . $transaction->id ),

                    ] ;

                }

            }
        }

        event( new LatestTransactions( $build_transactions ) ) ;

    	flash( "Donation successfully created." )->success() ;
    	return redirect()->back() ;

    }

    public function block_user($user_id) {
    	$user = ( User::find( $user_id ) )->update(['is_avtive'=>0]) ;

    	flash( "User successfully blocked." )->success() ;

    	return redirect()->back() ;

    }

}
