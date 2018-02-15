<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreFieldsToSettingsTable extends Migration
{

    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->boolean('donation_list_active')->default(1) ;
            $table->boolean('support_active')->default(1) ;
            $table->boolean('show_update_users')->default(1) ;
            $table->string('update_message')->default(1) ;
            $table->integer('realtime_delay')->default(5000) ;
        });
    }

    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            //
        });
    }
}
