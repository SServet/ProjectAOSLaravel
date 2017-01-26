<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ticket', function (Blueprint $table) {
            $table->increments('TID');
            $table->string('ATID')->references('ATID')->on('ArbeitscheinTicket');
            $table->integer('KID')->references('KID')->on('Kunden');
            $table->integer('MID')->references('MID')->on('Mitarbeter');
            $table->string('Bezeichnung');
            $table->string('Beschreibung')->nullable();
            $table->date('Erstelldatum');
            $table->date('AbgeschlossenAm')->nullable();
            $table->date('AbgerechnetAm')->nullable();
         
          
          
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
