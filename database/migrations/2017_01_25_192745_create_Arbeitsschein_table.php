<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArbeitsscheinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arbeitsschein', function (Blueprint $table) {
            $table->increments('asid');
            $table->string('kid')->references('kid')->on('kunden');
            $table->string('mid')->references('MID')->on('mitarbeiter');
            $table->string('description');
            $table->string('aNr')->references('aNr')->on('artikel');
            $table->integer('artAnz');
            $table->integer('ttid')->references('ttid')->on('termintyp');
            $table->integer('tkid')->references('tkid')->on('taetigkeitsart');
            $table->date('dateFrom');
            $table->date('dateTo')->nullable();
            $table->time('timeFrom')->nullable();
            $table->time('timeTo')->nullable();
            $table->decimal('billedTime',6,2)->nullable();
            $table->decimal('kulanzzeit',6,2)->nullable();
            $table->string('kulanzgrund')->nullable();
           });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('arbeitsschein');
    }
}
