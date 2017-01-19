<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMitarbeiterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Mitarbeiter', function (Blueprint $table) {
            $table->increments('MID');
            $table->string('Rolle');
            $table->string('Anrede');
            $table->string('Titel');
            $table->string('Vorname');
            $table->string('Nachname');
            $table->string('Benutzername');
            $table->string('Passwort');
            $table->string('Land');
            $table->integer('PLZ');
            $table->string('Ort');
            $table->string('Anschrift');
            $table->string('Telefon');
            $table->string('Mobil');
            $table->string('Fax');
            $table->string('Email');
            $table->string('Web');            
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Mitarbeiter');
    }
}
