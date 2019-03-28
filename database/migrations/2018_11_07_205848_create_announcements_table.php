<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnnouncementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('announcements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('phone',20);
            $table->string('brand',20);
            $table->string('description',500);
            $table->string('image',250);
            $table->string('answer_moya',200);
            $table->string('organic',10);
            $table->string('local',3);
            $table->string('artesanal',3);
            $table->string('furniture',3);
            $table->string('special_furniture',500)->nullable();
            $table->integer('idSede')->unsigned();
            $table->foreign('idSede')
                  ->references('id')
                  ->on('sedes')
                  ->onDelete('cascade');
            $table->integer('idCategory')->unsigned();
            $table->foreign('idCategory')
                  ->references('id')
                  ->on('categories')
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
        Schema::dropIfExists('announcements');
    }
}
