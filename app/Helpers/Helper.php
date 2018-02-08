<?php namespace App\Helpers;

	use App\Models\LevelUser ;
	use App\Models\Level ;

	class Helper {

		/**
		 * Helps with building the page meta data, or core data.
		 * 
		 */
		
		public static function PageBuilder( $title="", $data=[], $page_name="", $page_description=""  ) {


			if ( $title === "" ) 
				$title 					= "Home" ;

			$name 						= "Unknown" ;

			if ( auth()->check() )
				$name 					= auth()->user()->name . " " . auth()->user()->surname ;

			$avatar 					= "images/avatar.jpg" ;

			if ( auth()->check() ) 
				if ( auth()->user()->avatar !== "None" ) 
					$avatar 				= "images/avatar/" . auth()->user()->avatar ;

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
			

			$build_data 				= [
				'title'					=> $title,
				'data' 					=> $data,
				'name' 					=> $name,
				'avatar' 				=> $avatar,
				'level' 				=> $level,
				'page_name' 			=> $page_name,
				'page_description' 		=> $page_description,
				'available_funds' 		=> $available_funds,
				'withdrawn_funds' 		=> $withdrawn_funds,
				'funds_received' 		=> $funds_received,
			] ;

			return $build_data ;

		}

		/**
		 * 
		 * 
		 * 
		 */
	    public static function getCryptoData() {

			$curl = curl_init();

			curl_setopt_array($curl, array(
			    CURLOPT_RETURNTRANSFER => 1,
			    CURLOPT_URL => 'https://api.mybitx.com/api/1/ticker?pair=XBTZAR'
			));

			$responce = curl_exec($curl);

			curl_close($curl);

			$data = json_decode( $responce )  ;

			return $data->last_trade ;
	    }

	    /**
	     * 
	     * 
	     * 
	     */
	    public static function getUserLevel( $user_id ) {

	    	$user_level = LevelUser::whereUserId( $user_id )->first() ;

	    	$level 		= ( Level::find( $user_level->level_id ) )->level ;

	    	return $level ;

	    }
	}