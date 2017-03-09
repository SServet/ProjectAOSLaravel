<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMitarbeiterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitarbeiter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('isAdmin');
            $table->string('salutation');
            $table->string('title');
            $table->string('country');
            $table->string('plz');
            $table->string('city');
            $table->string('address')->nullable();
            $table->string('telphone')->nullable();
            $table->string('mobilephone')->nullable();
            $table->string('fax')->nullable();
            $table->string('web')->nullable();
            $table->rememberToken();
            $table->timestamps();
                     
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mitarbeiter');
    }
}
