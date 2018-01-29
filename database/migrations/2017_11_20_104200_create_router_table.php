<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRouterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
         Schema::create('router', function (Blueprint $table) {
            $table->string('NetworkID')->references('NetworkID')->on('network');
            $table->string('RouterID');
            $table->string('WAN_IP');
            $table->string('LAN_IP');
            $table->string('WLAN_SSID');
            $table->string('WLAN_Password');
            $table->string('DMZ');
            $table->string('Portforwardings');
            $table->integer('Portanzahl');
                       
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('router');
    }
}
