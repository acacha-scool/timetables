<?php

namespace Scool\Timetables;

/**
 * Class Timetables.
 *
 * @package Scool\Timetables
 */
class Timetables
{
    /**
     * Views copy path.
     *
     * @return array
     */
    public function views()
    {
        return [
            SCOOL_TIMETABLES_PATH.'/resources/views/assign-user-to-teacher.blade.php' =>
                resource_path('views/vendor/acacha_scool_staff/assign-user-to-teacher.blade.php')
        ];
    }

    /**
     * Seeds copy path.
     *
     * @return array
     */
    public function seeds()
    {
        return [
            SCOOL_TIMETABLES_PATH.'/database/seeds' =>
                database_path('seeds')
        ];
    }
}