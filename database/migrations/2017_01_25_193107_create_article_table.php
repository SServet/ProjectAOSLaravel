<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatearticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->integer('agid')->references('agid')->on('articlegroup')->nullable();
            $table->string('artid');
            $table->string('articlename')->nullable();
            $table->string('description')->nullable();
            $table->string('unit')->nullable();
            
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
        Schema::drop('article');
    }
}