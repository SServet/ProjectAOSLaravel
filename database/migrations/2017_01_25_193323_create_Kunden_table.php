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
         Schema::create('Kunden', function (Blueprint $table) {
            $table->increments('KID');
            $table->string('Anrede')->nullable();
            $table->string('Titel')->nullable();
            $table->string('Vorname')->nullable();
            $table->string('Nachname')->nullable();
            $table->string('Firmenname')->nullable();
            $table->string('Email')->nullable();
            $table->string('Land')->nullable();  
            $table->integer('PLZ')->nullable();          
            $table->string('Ort')->nullable();            
            $table->string('Strasse')->nullable();            
            $table->string('Telefon')->nullable();
            $table->string('Mobil')->nullable();
            $table->string('Fax')->nullable();           
            $table->string('Web')->nullable();
            $table->string('UIDNummer')->nullable();
            $table->integer('Steuernummer')->nullable();
            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Kunden');
    }
}
