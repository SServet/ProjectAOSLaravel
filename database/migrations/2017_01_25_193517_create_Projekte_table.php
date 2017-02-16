<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjekteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Projekte', function (Blueprint $table) {
            $table->increments('PID');
            $table->string('APID')->references('APID')->on('ArbeitscheinProjekt');
            $table->integer('KID')->references('KID')->on('Kunden');
            $table->integer('MID')->references('MID')->on('Mitarbeter');
            $table->string('Bezeichnung');
            $table->string('Beschreibung')->nullable();
            $table->decimal('Projektvolumen',10,2)->nullable();
            $table->date('Bestelldatum');
            $table->date('AbgeschlossenAm')->nullable();
            $table->date('AbgerechnetAm')->nullable();
            $table->string('Projektart')->nullable();
         
          
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Projekte');
    }
}
