<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivedirectoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('activedirectory', function (Blueprint $table) {
            $table->integer('NetworkID')->references('NetworkID')->on('network');
            $table->string('IP');
            $table->string('WLAN_SSID');
            $table->string('WLAN_Password');    
            $table->primary('NetworkID','IP');     
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('activedirectory');
    }
}