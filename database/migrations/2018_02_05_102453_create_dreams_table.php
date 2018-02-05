<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDreamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * name, amount, level, growth_amount, payday, member, member_assigned
     * 
     */
    public function up()
    {
        Schema::create('dreams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->float('amount');
            $table->float('growth_amount');
            $table->date('payday');
            $table->integer('level');
            $table->integer('user_id')->unsigned() ;

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dreams');
    }
}
