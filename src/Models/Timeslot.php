<?php

namespace Scool\Timetables\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Timeslot.
 *
 * @package Scool\Timetables\Models
 */
class Timeslot extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['init','end','lective','order'];

    /**
     * Get the shifts record associated with the time slot.
     */
    public function shifts()
    {
        return $this->belongsToMany(Shift::class)->withTimestamps();;
    }

    /**
     * Add shift to timeslot.
     *
     * @param Shift $shift
     */
    public function addShift(Shift $shift)
    {
        $this->shifts()->save($shift);
    }

    /**
     * Sync shift to timeslot only if not exists.
     *
     * @param Shift $shift
     */
    public function addShiftOnlyIfNotExists(Shift $shift)
    {
        $this->shifts()->syncWithoutDetaching([$shift->id]);
    }

}
