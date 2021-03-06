<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{

    public function run()
    {
        if ( DB::table('levels')->where('level', 1)->count() == 0 ) {
            DB::table('levels')->insert([
                'level' 		=> 1,
                'min_amount' 	=> 200,
                'max_amount' 	=> 2000,
            ]);
        }

        if ( DB::table('levels')->where('level', 2)->count() == 0 ) {

            DB::table('levels')->insert([
                'level' 		=> 2,
                'min_amount' 	=> 5000,
                'max_amount' 	=> 15000,
            ]);

        }

        if ( DB::table('levels')->where('level', 3)->count() == 0 ) {

            DB::table('levels')->insert([
                'level' 		=> 3,
                'min_amount' 	=> 18000,
                'max_amount' 	=> 50000,
            ]);

        }

    }
}
