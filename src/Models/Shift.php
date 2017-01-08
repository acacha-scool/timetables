<?php

namespace Scool\Timetables\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Shift.
 *
 * @package Scool\Timetables\Models
 */
class Shift extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the time slot records associated with the shift.
     */
    public function timeslots()
    {
        return $this->belongsToMany(Timeslot::class)->withTimestamps();;
    }

}
