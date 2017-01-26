<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArbeitsscheinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Arbeitsschein', function (Blueprint $table) {
            $table->increments('AsID');
            $table->string('KID')->references('KID')->on('Kunden');
            $table->string('MID')->references('MID')->on('Mitarbeiter');
            $table->string('Beschreibung');
            $table->string('TTID')->references('TTID')->on('Termintyp');
            $table->string('TKID')->references('TKID')->on('Taetigkeitsart');
            $table->date('DatumVon');
            $table->date('DatumBis')->nullable();
            $table->time('UhrzeitVon');
            $table->time('UhrzeitBis')-->nullable();
            $table->decimal('VerrechneteZeit',6,2);
            $table->decimal('Kulanzzeit',6,2);
            $table->string('Kulanzgrund');
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('Arbeitsschein');
    }
}
