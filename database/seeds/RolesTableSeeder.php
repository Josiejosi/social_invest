<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    public function run()
    {

        if ( DB::table('roles')->where( 'name', 'member' )->count() == 0 ) {

            DB::table('roles')->insert([
                'name' 			=> "member",
                'description' 	=> "Standard frondend user",
            ]) ;

        }

        if ( DB::table('roles')->where( 'name', 'admin' )->count() == 0 ) {

            DB::table('roles')->insert([
                'name' 			=> "admin",
                'description' 	=> "You who allocates user",
            ]) ;

        }

        if ( DB::table('roles')->where( 'name', 'owner' )->count() == 0 ) {

            DB::table('roles')->insert([
                'name'          => "owner",
                'description'   => "First person to allocates user",
            ]) ;

        }

        if ( DB::table('roles')->where( 'name', 'support' )->count() == 0 ) {

            DB::table('roles')->insert([
                'name' 			=> "support",
                'description' 	=> "Helps users out.",
            ]) ;

        }

    }

}
