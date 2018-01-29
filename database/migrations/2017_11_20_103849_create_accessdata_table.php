<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccessdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
        Schema::create('accessdata', function (Blueprint $table) {
            $table->integer('did')->references('did')->on('device');
            $table->string('system');
            $table->string('username');
            $table->string('password');   
            $table->primary('did');      
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('accessdata');
    }
}
