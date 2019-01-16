<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEditionGalleriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('edition_galleries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('route',250);
            $table->integer('idEdition')->unsigned();
            $table->foreign('idEdition')
                  ->references('id')
                  ->on('editions')
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
        Schema::dropIfExists('edition_galleries');
    }
}
