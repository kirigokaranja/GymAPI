<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGymInstructorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_instructors_95006', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('contact');
            $table->string('email');
            $table->string('image');
            $table->string('gender');
            $table->string('bio');
            $table->integer('gym_id');
            $table->timestamps();

            $table->foreign('gym_id')->references('id')->on('gym_details_95006');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gym_instructors_95006');
    }
}
