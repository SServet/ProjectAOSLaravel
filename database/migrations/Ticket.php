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
            $table->char('KID',5);
            $table->char('MID',5);
            $table->string('Bezeichnung');
            $table->string('Bezeichnung');
            $table->date('Erstelldatum');
            $table->date('AbgeschlossenAm');
            $table->time('AbgerechnetAm');
            $table->string('ATID');
          
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
