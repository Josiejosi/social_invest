<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     * 
     * reference_code, account_id, dream_id, donar
     * 
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('transaction_reference_code');
            $table->float('amount');
            $table->integer('level');
            $table->integer('status');
            $table->integer('account_id')->unsigned()->nullable();
            $table->integer('dream_id')->unsigned();
            $table->integer('donar_id')->unsigned() ;
            $table->timestamps();

            $table->foreign('donar_id')->references('id')->on('users');
            $table->foreign('dream_id')->references('id')->on('dreams');
            $table->foreign('account_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
