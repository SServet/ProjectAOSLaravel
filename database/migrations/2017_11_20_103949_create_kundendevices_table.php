<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKundendevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('kundendevices', function (Blueprint $table) {
            $table->string('KID')->references('KID')->on('kunden');
            $table->string('DID')->references('DID')->on('devices');
            $table->primary('KID','DID');              
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kundendevices');
    }
}
