<?php namespace App\Helpers;

	use App\Models\LevelUser ;
	use App\Models\RoleUser ;
	use App\Models\Referral ;
	use App\Models\Setting ;
	use App\Models\Level ;
	use App\Models\Role ;
	use App\Models\User ;
	
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
	}