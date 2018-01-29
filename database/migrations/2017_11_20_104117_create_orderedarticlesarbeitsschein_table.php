<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderedarticlesarbeitsscheinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
    {
         Schema::create('orderedarticlesarbeitsschein', function (Blueprint $table) {
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
        Schema::drop('orderedarticlesarbeitsschein');
    }
}
