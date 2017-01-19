<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArbeitsscheiProejktTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ArbeitsscheinProjekt', function (Blueprint $table) {
            $table->increments('APID'5);
            $table->char('MID',5);
            $table->string('Beschreibung');
            $table->char('ANr',64);
            $table->char('TTID',5);
            $table->char('TKID',5);
            $table->date('DatumVon');
            $table->date('DatumBis');
            $table->time('UhrzeitVon');
            $table->time('UhrzeitBis');
            $table->decimal('VerrechneteZeit',6,2);
            $table->decimal('Kulanzzeit',6,2);
            $table->string('Kulanzgrund',6,2);
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
