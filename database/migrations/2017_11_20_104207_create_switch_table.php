<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSwitchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('switch', function (Blueprint $table) {
            $table->string('NetworkID')->references('NetworkID')->on('network');
            $table->string('SwitchID');
            $table->integer('Portcount');
            $table->string('Managed');
            $table->integer('Dyn_DNS');                              
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('switch');
    }
}
