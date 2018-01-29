<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dns', function (Blueprint $table) {
            $table->integer('RouterID')->references('RouterID')->on('router');
            $table->integer('NetworkID')->references('NetworkID')->on('network');
            $table->string('DNS');
            
            $table->primary('DNS');     
            
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('dns');
    }
}
