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
            $table->string('name',50);
            $table->string('street',100);
            $table->string('number',10)->nullable();
            $table->string('colony',30);
            $table->integer('idSede')->unsigned();
            $table->foreign('idSede')
                  ->references('id')
                  ->on('sedes')
                  ->onDelete('cascade');
            $table->string('latitude',250)->nullable();
            $table->string('longitude',250)->nullable();
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
