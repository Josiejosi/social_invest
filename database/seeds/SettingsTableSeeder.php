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
        DB::table('settings')->insert([
            'max_daily_users' 			=> 100,
            'max_daily_donations' 		=> 5,
            'useless_user_days' 		=> 5,
            'max_payment_days' 			=> 7,
            'max_confirmed_donations'   => 20,
            'growth_percentage' 	    => 30,
        ]) ;
    }
}
