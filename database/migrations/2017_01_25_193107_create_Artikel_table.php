<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtikelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Artikel', function (Blueprint $table) {
            $table->string('ANr');
            $table->integer('AgID')-references('AgID')->on('Artikelgruppe');
            $table->string('Artikelname');
            $table->string('Verkaufspreis');
            $table->string('Einheit')->nullable();
            $table->integer('Mwst');
            $table->string('Bezeichnung');
            $table->primary('ANr');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Artikel');
    }
}
