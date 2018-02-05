<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * * name, username, username, country, cell_phone_number, email_address, is_verified, verification_code, is_avtive, avatar
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('name');
            $table->string('surname');
            $table->string('country');
            $table->string('cell_phone_number');
            $table->boolean('is_verified');
            $table->string('verification_code');
            $table->boolean('is_avtive');
            $table->string('avatar');
            $table->boolean('is_online');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
