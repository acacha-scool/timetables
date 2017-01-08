<?php

namespace Scool\Timetables\Models;

use Illuminate\Database\Eloquent\Model;
use Scool\Curriculum\Models\Classroom;
use Scool\Curriculum\Models\Submodule;
use Scool\Foundation\User;

/**
 * Class Lesson.
 *
 * @package Scool\Timetables\Models
 */
class Lesson extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['location_id','day_id','timeslot_id'];

    /**
     * Get the user records associated with the lesson.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * Get the user records associated with the lesson.
     */
    public function submodules()
    {
        return $this->belongsToMany(Submodule::class)->withTimestamps();
    }

    /**
     * Get the classroom groups associated with the lesson.
     */
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class)->withTimestamps();
    }

    /**
     * Add teacher to lesson
     */
    public function addTeacher($teacher)
    {
        $this->addUser($teacher);
    }

    /**
     * Add user to lesson.
     *
     * @param $user
     */
    public function addUser($user)
    {
        $this->users()->save($user);
    }

    /**
     * Add submodule to lesson.
     *
     * @param $submodule
     */
    public function addSubmodule($submodule)
    {
        $this->submodules()->save($submodule);
    }

    /**
     * Add classroom to lesson.
     *
     * @param $classroom
     */
    public function addClassroom($classroom)
    {
        $this->classrooms()->save($classroom);
    }

}
