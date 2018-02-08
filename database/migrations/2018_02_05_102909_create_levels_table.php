<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{

    public function up()
    {

        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('level');
            $table->float('min_amount');
            $table->float('max_amount');
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('levels');
    }

}
