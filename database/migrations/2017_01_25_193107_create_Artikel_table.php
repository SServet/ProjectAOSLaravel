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
            $table->string('Beschreibung')->nullable();
            $table->string('Einheit')->nullable();
            $table->integer('AgID')->references('AgID')->on('Artikelgruppe');
            $table->integer('Mwst')->nullable();
            $table->string('Artikelname')->nullable();
            $table->string('Verkaufspreis')->nullable();
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
