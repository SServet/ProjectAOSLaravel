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
            $table->string('KID');
            $table->string('MID');
            $table->string('Beschreibung');
            $table->string('TTID');
            $table->string('TKID');
            $table->string('DatumVon');
            $table->string('DatumBis');
            $table->integer('UhrzeitVon');
            $table->string('UhrzeitBis');
            $table->string('VerrechneteZeit');
            $table->string('Kulanzzeit');
            $table->string('Kulanzgrund');
            //nicht korrekt
            
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
