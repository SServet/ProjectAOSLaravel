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
            $table->string('Titel')->nullable();
            $table->string('Vorname');
            $table->string('Nachname');
            $table->string('Firmenname')->nullable();
            $table->string('Land');
            $table->integer('PLZ');
            $table->string('Ort');
            $table->string('Anschrift');
            $table->string('Telefon')->nullable();
            $table->string('Mobil')->nullable();
            $table->string('Fax')->nullable();
            $table->string('EMail');
            $table->string('Web')->nullable();
            $table->string('UIDNummer');
            $table->integer('Steuernummer');
            $table->primary('KID');
            
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
