<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateLessonsTable
 */
class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->unsigned()->nullable();
            $table->integer('day_id')->unsigned()->nullable();
            $table->integer('timeslot_id')->unsigned()->nullable();
            $table->integer('vacancy_id')->unsigned()->nullable();
            $table->integer('submodule_id')->unsigned()->nullable();
            $table->integer('classroom_id')->unsigned()->nullable();
            $table->string('code');
            $table->string('state');
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('day_id')->references('id')->on('days');
            $table->foreign('timeslot_id')->references('id')->on('timeslots');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
