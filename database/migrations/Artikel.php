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
            $table->char('ANr',64);
            $table->char('AgID',5);
            $table->string('Artikelname');
            $table->string('Verkaufspreis');
            $table->string('Einheit');
            $table->string('Mwst');
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
