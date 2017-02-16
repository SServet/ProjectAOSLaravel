<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArbeitsscheinTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ArbeitsscheinTicket', function (Blueprint $table) {
            $table->increments('ATID');
            $table->integer('MID')->references('MID')->on('Mitarbeiter');
            $table->string('Beschreibung');
            $table->string('ANr')->references('ANr')->on('Artikel');
            $table->integer('TTID')->references('TTID')->on('Termintyp');
            $table->integer('TKID')->references('TKID')->on('Taetigkeitsart');
            $table->date('DatumVon');
            $table->date('DatumBis')->nullable();
            $table->time('UhrzeitVon');
            $table->time('UhrzeitBis')->nullable();
            $table->decimal('VerrechneteZeit',6,2)->nullable();
            $table->decimal('Kulanzzeit',6,2)->nullable();
            $table->string('Kulanzgrund')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ArbeitsscheinTicket');
    }
}
