<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArbeitsscheinProejktTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ArbeitsscheinProjekt', function (Blueprint $table) {
            $table->increments('APID');
            $table->integer('MID')->references('MID')->on('Mitarbeter');
            $table->string('Beschreibung');
            $table->string('ANr')->references('ANr')->on('Artikel');
            $table->int('TTID')->references('TTID')->on('Termintyp');
            $table->char('TKID',5)->references('TKID')->on('Taetigkeitsart');
            $table->date('DatumVon');
            $table->date('DatumBis')->nullable();
            $table->time('UhrzeitVon');
            $table->time('UhrzeitBis')->nullable();
            $table->decimal('VerrechneteZeit',6,2);
            $table->decimal('Kulanzzeit',6,2);
            $table->string('Kulanzgrund');
            $table->primary('APID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ArbeitsscheinProjekt');
    }
}
