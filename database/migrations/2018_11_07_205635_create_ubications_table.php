<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('street',20);
            $table->string('number',10);
            $table->string('colony',20);
            $table->integer('idSede')->unsigned();
            $table->foreign('idSede')
                  ->references('id')
                  ->on('sedes')
                  ->onDelete('cascade');
            $table->string('latitude',15);
            $table->string('longitude',15);
            $table->integer('idEvent')->unsigned();
            $table->foreign('idEvent')
                  ->references('id')
                  ->on('events')
                  ->onDelete('cascade');      
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
        Schema::dropIfExists('ubications');
    }
}
