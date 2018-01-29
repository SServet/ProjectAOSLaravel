<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->integer('NetworkID')->references('NetworkID')->on('network');
            $table->string('DID');
            $table->string('type');
            $table->date('constructionYear');  
            $table->string('serialnumber');
            $table->string('productnumber');
            $table->date('warrantydate');
            $table->string('HDD');
            $table->string('CPU');
            $table->string('RAM');
            $table->string('operatingSystem');
            $table->string('installedPrinter');
            $table->string('installedProgramms');
            $table->string('standardUser');
            $table->string('standardPassword');
            $table->primary('DID');     
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('devices');
    }
}
