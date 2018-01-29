<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLicensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::create('licenses', function (Blueprint $table) {
            $table->string('DID')->references('DID')->on('devices');
            $table->string('description');
            $table->string('system');
            $table->string('licensenumber');
            $table->string('comment');
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
        Schema::drop('licenses');
    }
}
