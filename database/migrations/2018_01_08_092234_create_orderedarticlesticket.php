<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderedarticlesticket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('orderedarticlesticket', function (Blueprint $table) {
            $table->string('AsID')->references('AsID')->on('arbeitsschein');
            $table->string('artID')->references('artID')->on('article');
            $table->string('unit');
            $table->integer('count');                       
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::drop('orderedarticlesticket');
    }
}
