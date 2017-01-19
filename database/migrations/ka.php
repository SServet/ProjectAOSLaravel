<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjektTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Projekt', function (Blueprint $table) {
            $table->increments('PID');
            $table->char('KID',5);
            $table->char('MID',5);
            $table->string('Bezeichnung');
            $table->string('Beschreibung');
            $table->decimal('Projektvolumen',10,2)
            $table->date('Bestelldatum');
            $table->date('AbgeschlossenAm');
            $table->time('AbgerechnetAm');
            $table->string('APID');
            $table->string('Projektart');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Ticket');
    }
}
