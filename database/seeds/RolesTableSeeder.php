<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('roles')->insert([
            'name' 			=> "member",
            'description' 	=> "Standard frondend user",
        ]) ;

        DB::table('roles')->insert([
            'name' 			=> "admin",
            'description' 	=> "You who allocates user",
        ]) ;

        DB::table('roles')->insert([
            'name'          => "owner",
            'description'   => "First person to allocates user",
        ]) ;

        DB::table('roles')->insert([
            'name' 			=> "support",
            'description' 	=> "Helps users out.",
        ]) ;

    }

}
