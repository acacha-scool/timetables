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
            $table->string('state')->nullable();
            $table->timestamps();
            $table->foreign('location_id')->references('id')->on('locations');
            $table->foreign('day_id')->references('id')->on('days');
            $table->foreign('timeslot_id')->references('id')->on('timeslots');
        });

        Schema::create('lesson_user', function (Blueprint $table) {
            $table->integer('lesson_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->unique(['lesson_id', 'user_id']);
        });

        Schema::create('lesson_submodule', function (Blueprint $table) {
            $table->integer('lesson_id')->unsigned();
            $table->integer('submodule_id')->unsigned();
            $table->timestamps();
            $table->unique(['lesson_id', 'submodule_id']);
        });

        Schema::create('classroom_lesson', function (Blueprint $table) {
            $table->integer('classroom_id')->unsigned();
            $table->integer('lesson_id')->unsigned();
            $table->timestamps();
            $table->unique(['classroom_id', 'lesson_id']);
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
        Schema::dropIfExists('lesson_user');
        Schema::dropIfExists('lesson_submodule');
        Schema::dropIfExists('classroom_lesson');
    }
}
