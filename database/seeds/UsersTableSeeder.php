<?php

use Illuminate\Database\Seeder;

use App\Models\Role ;
use App\Models\User ;
use App\Models\Level ;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ( DB::table('users')->where('email', 'support@bitroseed.com')->count() == 0 ) {

            DB::table('users')->insert([

		        'name'						=> "Support", 
		        'email'						=> "support@bitroseed.com", 
		        'password'					=> bcrypt("Spt@2018"), 
		        'surname'					=> "", 
		        'country'					=> "USA", 
		        'is_verified'				=> 1, 
		        'verification_code'			=> '2018', 
		        'referral_code'				=> '2018', 
		        'is_avtive'					=> 1, 
		        'avatar'					=> 'images/support.png', 
		        'is_online'					=> 0, 

            ]) ;

	        $level                          = Level::whereLevel(1)->first() ;

	        $role                           = Role::whereName("support")->first() ;

	        $user 							= User::whereEmail("support@bitroseed.com")->first() ;


	        if ( DB::table('role_user')->where('user_id',$user->id)->where('level_id',$level->id)->count() == 0 ) {

		        DB::table('role_user')->insert([

		            'user_id'                   => $user->id, 
		            'level_id'                  => $level->id, 

		        ]) ;

	    	}

	    	if ( DB::table('role_user')->where('user_id',$user->id)->where('role_id',$role->id)->count() == 0 ) {

		        DB::table('level_user')->insert([

		            'user_id'                   => $user->id, 
		            'role_id'                   => $role->id, 

		        ]) ;

	    	}

        }


        if ( DB::table('users')->where('email', 'team@bitroseed.com')->count() == 0 ) {

            DB::table('users')->insert([

		        'name'						=> "Team", 
		        'email'						=> "team@bitroseed.com", 
		        'password'					=> bcrypt("Team@2018"), 
		        'surname'					=> "", 
		        'country'					=> "USA", 
		        'is_verified'				=> 1, 
		        'verification_code'			=> '2018', 
		        'referral_code'				=> '2018', 
		        'is_avtive'					=> 1, 
		        'avatar'					=> 'images/group.jpg', 
		        'is_online'					=> 0, 

            ]) ;

	        $role                           = Role::whereName("member")->first() ;

	        $user 							= User::whereEmail("team@bitroseed.com")->first() ;


	        if ( DB::table('level_user')->where('user_id',$user->id)->where('level_id',1)->count() == 0 ) {

		        DB::table('level_user')->insert([

		            'user_id'                   => $user->id, 
		            'level_id'                  => 1, 

		        ]) ;

	    	}

	    	if ( DB::table('role_user')->where('user_id',$user->id)->where('role_id',$role->id)->count() == 0 ) {

		        DB::table('role_user')->insert([

		            'user_id'                   => $user->id, 
		            'role_id'                   => $role->id, 

		        ]) ;

	    	}

        }

    }
}
