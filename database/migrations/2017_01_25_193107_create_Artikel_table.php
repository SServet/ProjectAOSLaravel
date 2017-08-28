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
        Schema::create('artikel', function (Blueprint $table) {
            $table->string('artid');
            $table->string('articlename')->nullable();
            $table->string('description')->nullable();
            $table->string('unit')->nullable();
            $table->integer('agid')->references('agid')->on('artikelgruppe')->nullable();
            $table->integer('mwst')->nullable();            
            $table->string('salePrice')->nullable();
            $table->primary('artid');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('artikel');
    }
}