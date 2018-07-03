<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions_95006', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('exercise_name');
            $table->integer('reps');
            $table->integer('sets');
            $table->string('status');
            $table->integer('user_id');
            $table->timestamps();

//            $table->foreign('user_id')->references('id')->on('user_95006');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions_95006');
    }
}
