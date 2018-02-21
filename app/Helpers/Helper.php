<?php namespace App\Helpers;

	use App\Models\Transaction ;
	use App\Models\LevelUser ;
	use App\Models\RoleUser ;
	use App\Models\Referral ;
	use App\Models\Setting ;
	use App\Models\Level ;
	use App\Models\Role ;
	use App\Models\User ;
	use App\Models\Eth ;
	use App\Models\Btc ;

	use Carbon\Carbon ;
	
	class Helper {

		/**
		 * Helps with building the page meta data, or core data.
		 */
		
		public static function PageBuilder( $title="", $data=[], $page_name="", $page_description=""  ) {


			if ( $title === "" ) 
				$title 					= "Home" ;

			if ( $page_name === "" ) 
				$page_name 				= "Home" ;

			if ( $page_description === "" ) 
				$page_description 		= "" ;

			$available_funds			= 0 ;
			$withdrawn_funds			= 0 ;
			$funds_received				= 0 ;

			$contributions_made 		= 0 ;

			

			if ( $title === "Home" ) {
				//get display data.
				//
			}

			$level						= 1 ;
			$role						= 1 ;
			$avatar 					= "images/avatar.jpg" ;
			$name 						= "Unknown" ;

			$support_avatar 			= "" ;

			if ( auth()->check() ) {

				$user_id 				= auth()->user()->id ;
				$level 					= self::getUserLevel( auth()->user()->id ) ;
				$role 					= self::getUserRole( $user_id ) ;

				if ( auth()->user()->avatar !== "None" ) 
					$avatar 			= auth()->user()->avatar ;

				$name 					= auth()->user()->name . " " . auth()->user()->surname ;

				$support_user 			= User::find( self::getSupportUserID() ) ;

				$support_avatar 		= $support_user->avatar ;
				$available_funds		= self::getReferralPoints( $user_id ) * 1.5 ;

				$contributions_made 	= Transaction::where('donar_id', $user_id)->count() ;

			}

			$build_data 				= [
				'title'					=> $title,
				'data' 					=> $data,
				'name' 					=> $name,
				'avatar' 				=> $avatar,
				'level' 				=> $level,
				'role' 					=> $role,
				'page_name' 			=> $page_name,
				'support_avatar' 		=> $support_avatar,
				'page_description' 		=> $page_description,
				'available_funds' 		=> $available_funds,
				'withdrawn_funds' 		=> $withdrawn_funds,
				'funds_received' 		=> $funds_received,
				'contributions_made' 	=> $contributions_made,
			] ;

			return $build_data ;

		}

		/**
		 * getCryptoData
		 */
	    public static function getCryptoData() {

			$curl = curl_init();

			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => 'https://api.bitfinex.com/v1/ticker/btcusd'
			));

			$responce = curl_exec($curl);

			curl_close($curl);

			$data = json_decode( $responce, true )  ;

			if ( isset( $data["last_price"] ) )

				return $data["last_price"] ;

			return 1 ;
	    }

		/**
		 * getETHData
		 */
	    public static function getETHData() {

			$curl = curl_init();

			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => 'https://api.bitfinex.com/v1/ticker/ethusd'
			));

			$responce = curl_exec($curl);

			curl_close($curl);

			$data = json_decode( $responce, true )  ;

			if ( isset( $data["last_price"] ) )

				return $data["last_price"] ;

			return 1 ;
	    }

	    /**
	     * getLatestDonations
	     */
	    public static function getLatestDonations() {

	    	$transactions 	  						= Transaction::where( 'status', '<>', 3 ) ->get() ;	

	    	$now 									= Carbon::now() ;

	    	$build_transactions 					= [] ;


	    	if ( count( $transactions ) > 0 ) {

	    		foreach ( $transactions as $transaction ) {

	    			if ( ( $transaction->payday )->diffInDays( $now ) >= 7 ) {

		    			$build_transactions[]		=  [

		    				'name'					=> $transaction->donee->name . " " . $transaction->donee->surname ,
		    				'donee_id'				=> $transaction->donee_id ,
		    				'status'				=> $transaction->status,
		    				'deposit_type'			=> $transaction->deposit_type,
		    				'growth_amount'			=> $transaction->growth_amount,
		    				'url'					=> url( "/" . "select_contribution" . "/" . $transaction->id ),

		    			] ;

	    			}

	    		}
	    	}

	    	return $build_transactions ;

	    }

	    /**
	     * getUserLevel
	     */
	    public static function getUserLevel( $user_id ) {

	    	if ( auth()->check() ) {
		    	
		    	if ( LevelUser::whereUserId( $user_id )->count() > 0 ) {
		    		$user_level = LevelUser::whereUserId( $user_id )->first() ;
			    	$level 		= ( Level::find( $user_level->level_id ) )->level ;
			    	return $level ;
		    	} 
	    	}

	    	return 1 ;

	    }

	    /**
	     * getUserRole
	     */

	    public static function getUserRole( $user_id ) {

	    	if ( auth()->check() ) {
	    		if ( RoleUser::whereUserId( $user_id )->count() > 0 ) {
		    		$user_role = RoleUser::whereUserId( $user_id )->first() ;
		    		return $user_role->role_id  ;
	    		}
	    	}

	    	return 1 ;

	    }

	    /**
	     * getReferralPoints
	     */

	    public static function getReferralPoints( $user_id ) {

	    	return Referral::whereReferralBy( $user_id )->count() ;

	    }

	    /**
	     * getMaxDailyDsers
	     */

	    public static function getMaxDailyUsers() {

	    	return ( Setting::first() )->max_daily_users ;
	    }

	    /**
	     * getMaxDailyDonations
	     */

	    public static function getMaxDailyDonations() {

	    	return ( Setting::first() )->max_daily_donations ;
	    }

	    /**
	     * getUselessUserDays
	     */

	    public static function getUselessUserDays() {

	    	return ( Setting::first() )->useless_user_days ;
	    }

	    /**
	     * getMaxPaymentDays
	     */

	    public static function getMaxPaymentDays() {

	    	return ( Setting::first() )->max_payment_days ;
	    }

	    /**
	     * getMaxConfirmedDonations
	     */

	    public static function getMaxConfirmedDonations() {

	    	return ( Setting::first() )->max_confirmed_donations ;
	    }

	    /**
	     * getMaxConfirmedDonations
	     */

	    public static function getGrowthPercentage() {

	    	return ( Setting::first() )->growth_percentage ;
	    }

	    /**
	     * NEW SETTINGS OPTIONS.
	     * =========================
	     * 
	     * getDonationListActive
	     */

	    public static function getDonationListActive() {

	    	return ( Setting::first() )->donation_list_active ;
	    }

	    /**
	     * NEW SETTINGS OPTIONS.
	     * =========================
	     * 
	     * getSupportActive
	     */

	    public static function getSupportActive() {

	    	return ( Setting::first() )->support_active ;
	    }

	    /**
	     * getSupportActive
	     */

	    public static function getShowUpdateUsers() {

	    	return ( Setting::first() )->show_update_users ;
	    }

	    /**
	     * getSupportActive
	     */

	    public static function getRealtimeDelay() {

	    	return ( Setting::first() )->realtime_delay ;
	    }

	    /**
	     * getSupportActive
	     */

	    public static function getAmountAllowedForSplitting() {

	    	return ( Setting::first() )->amount_allowed_split ;
	    }

	    /**
	     * getSupportUserID
	     */

	    public static function getSupportUserID() {

	    	return ( User::whereEmail( 'support@bitroseed.com' )->first() )->id ;
	    }

	    /**
	     * getSupportUserID
	     */

	    public static function getTeamUserID() {

	    	return ( User::whereEmail( 'team@bitroseed.com' )->first() )->id ;
	    }

	    /**
	     * getSupportRole
	     */

	    public static function getSupportRole() {

	    	$support_user_id 				= self::getSupportUserID() ;

	    	return self::getUserRole( $support_user_id ) ;

	    }

	    /**
	     * getSupportRole
	     */

	    public static function isSupport() {

	    	$is_support 					= false ;

	    	if ( auth()->check() ) {

		    	if ( auth()->user()->email == "support@bitroseed.com" ) 
		    		$is_support 			= true ;

	    	}

	    	return $is_support ;

	    }

	    public static function getCurrentCryptoAddresses( $user ) {

		    $btc 							= "" ;
		    $eth 							= "" ;

	    	if ( count( $user ) > 0 ) {

		        $cryptos 					= $user->crpyto()->get() ;

		        if ( count($cryptos) > 0 ) {
		            foreach ( $cryptos as $crypto ) {
		                
		                if ( $crypto->name === "BITCOIN" )

		                    $btc 			= $crypto->address ;

		                else 

		                    $eth 			= $crypto->address ; 

		                
		            }
		        }

	    	}

	    	return [ 'btc' => $btc, 'eth' => $eth ] ;

	    }

	    public static function getBtcLatestAmount() {
	    	return ( Btc::orderBy( 'created_at', 'Desc' )->first() )->btc ;
	    }

	    public static function getEthLatestAmount() {
	    	return ( Eth::orderBy( 'created_at', 'Desc' )->first() )->eth ;
	    }

	    public static function createBlockChainWallet( $password, $email, $label ) {

	    	$api_code 							= env( 'BLOCKCHAIN_APICODE' ) ;

	    	$blockchain_url 					= "http://localhost:3000/api/v2/create" ;
	    	$blockchain_url 					.= "?password=$password" ;
	    	$blockchain_url 					.= "&email=$email" ;
	    	$blockchain_url 					.= "&label=$label" ;
	    	$blockchain_url 					.= "&api_code=$api_code" ;
	    	$blockchain_url 					.= "&hd=true" ;

	    	$ch 								= curl_init( $blockchain_url ) ;

	        curl_setopt( $ch, CURLOPT_HEADER, 0 ) ;
	        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 ) ;

	        $json_results 						= curl_exec( $ch ) ; 

			if ( curl_error( $ch ) )
			    return [ "message" => "Sorry we where unable to create the wallet at the moment, please try again later." ] ;

	        curl_close( $ch ) ;

	        return $json_results ;

	    }

	    public static function getWalletBalance( $ppassword, $wallet_id ) {

	    	$blockchain_url 					= "http://localhost:3000/merchant/$wallet_id/balance?password=$ppassword" ;

	    	$ch 								= curl_init( $blockchain_url ) ;

	        curl_setopt( $ch, CURLOPT_HEADER, 0 ) ;
	        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 ) ;

	        $json_results 						= curl_exec( $ch ) ; 

			if ( curl_error( $ch ) )
			    return [ "message" => "Sorry we where unable to get your wallet balance at the moment, please try again later." ] ;

	        curl_close( $ch ) ;

	        return $json_results ;

	    }

	    public static function makePayment( $guid, $main_password, $address, $amount ) {

			$blockchain_url						= "http://localhost:3000/merchant/$guid/payment" ;
			$blockchain_url						.= "?password=$main_password" ;
			$blockchain_url						.= "&to=$address" ;
			$blockchain_url						.= "&amount=$amount" ;

	    	$ch 								= curl_init( $blockchain_url ) ;

	        curl_setopt( $ch, CURLOPT_HEADER, 0 ) ;
	        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 ) ;

	        $json_results 						= curl_exec( $ch ) ; 

			if ( curl_error( $ch ) )
			    return [ 
			    	"message" => 
			    	"Sorry we where unable to make outgoing payments from this wallet at the moment, please try again later." 
			    ] ;

	        curl_close( $ch ) ;

	        return $json_results ;

	    }
	}