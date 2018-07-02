<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_locations_95006', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gym_id');
            $table->float('latitude');
            $table->float('longitude');
            $table->timestamps();

            $table->foreign('gym_id')->references('id')->on('gym_95006');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_locations_95006');
    }
}
