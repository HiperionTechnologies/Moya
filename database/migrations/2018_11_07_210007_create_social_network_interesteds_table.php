<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialNetworkInterestedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_network_interesteds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link');
            $table->integer('idInterested')->unsigned();
            $table->foreign('idInterested')
                  ->references('id')
                  ->on('interesteds')
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
        Schema::dropIfExists('social_network_interesteds');
    }
}
