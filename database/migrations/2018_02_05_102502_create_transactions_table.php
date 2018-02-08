<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{

    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_reference_code');
            $table->float('amount');
            $table->integer('level');
            $table->integer('status'); //0 - Un allocated, 1- allocated, 2 - paid. in dream 3 matured.
            $table->integer('dream_id')->unsigned();
            $table->integer('donar_id')->unsigned()->nullable() ;

            $table->timestamps();
            $table->foreign('dream_id')->references('id')->on('dreams');
        });
    }

    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
