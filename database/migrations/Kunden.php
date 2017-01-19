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
            $table->string('Anrede');
            $table->string('Titel');
            $table->string('Vorname');
            $table->string('Nachname');
            $table->string('Firmenname');
            $table->string('Land');
            $table->integer('PLZ');
            $table->string('Ort');
            $table->string('Anschrift');
            $table->string('Telefon');
            $table->string('Mobil');
            $table->string('Fax');
            $table->string('Email');
            $table->string('Web');
            $table->string('UIDNummer');
            $table->integer('Steuernummer');
            
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
