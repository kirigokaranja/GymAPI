<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_95006', function (Blueprint $table) {
            $table->increments('id');
            $table->date('dob');
            $table->string('gender');
            $table->string('weight');
            $table->string('desired_weight');
            $table->string('height');
            $table->string('homegym');
            $table->unsignedInteger('user_id');
            $table->timestamps();

//            $table->foreign('user_id')->references('id')->on('user_95006');
//            $table->foreign('homegym')->references('id')->on('gym_locations_95006');

        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_95006');
    }
}
