<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKundenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('kunden', function (Blueprint $table) {
            $table->increments('kid');
            $table->string('salutation')->nullable();
            $table->string('title')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('companyname')->nullable();
            $table->string('email')->nullable();
            $table->string('country')->nullable();  
            $table->string('plz')->nullable();          
            $table->string('city')->nullable();            
            $table->string('street')->nullable();            
            $table->string('telephone')->nullable();
            $table->string('mobilephone')->nullable();
            $table->string('fax')->nullable();           
            $table->string('web')->nullable();
            $table->string('UIDNumber')->nullable();
            $table->integer('taxID')->nullable();
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('kunden');
    }
}
