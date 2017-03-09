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
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('tid');
            $table->string('atid')->references('atid')->on('arbeitscheinTicket');
            $table->integer('kid')->references('kid')->on('kunden');
            $table->integer('mid')->references('mid')->on('mitarbeter');
            $table->string('label');
            $table->string('description')->nullable();
            $table->date('creationDate');
            $table->date('finishedOn')->nullable();
            $table->date('settledOn')->nullable();
         
          
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ticket');
    }
}
