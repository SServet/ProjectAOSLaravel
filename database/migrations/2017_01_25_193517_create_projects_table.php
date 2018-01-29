<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('pid');
           /* $table->string('apid')->references('apid')->on('arbeitscheinProjekt')->nullable(); */
            $table->integer('kid')->references('kid')->on('kunden');
            $table->integer('mid')->references('mid')->on('mitarbeter');
            $table->string('label');
            $table->string('description')->nullable();
            $table->decimal('projectVolume',10,2)->nullable();
            $table->date('creationDate');
            $table->date('finishedOn')->nullable();
            $table->date('settledOn')->nullable();
            $table->string('projectType')->nullable();
            $table->integer('isClosed')->default(0);     
            $table->date('lastUpdatedAt')->nullable();            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('projects');
    }
}
