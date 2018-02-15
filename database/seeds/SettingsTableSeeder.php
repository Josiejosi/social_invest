<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete() ;
        
        if ( DB::table('settings')->count() == 0 ) {

            DB::table('settings')->insert([

                'max_daily_users' 			=> 100,
                'max_daily_donations' 		=> 5,
                'useless_user_days' 		=> 5,
                'max_payment_days' 			=> 7,
                'max_confirmed_donations'   => 20,
                'growth_percentage'         => 30,
                //New settings
                //
                'donation_list_active'      => 1,
                'support_active'            => 1,
                'show_update_users'         => 0,
                'update_message'            => "Welcome to BITROSEED",
                'realtime_delay' 	        => 5000,

            ]) ;

        }
    }
}
