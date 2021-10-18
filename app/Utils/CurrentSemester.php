<?php

namespace App\Utils;

class CurrentSemester
{
    public $semesters;

    function getCurrentSemester()
    {
        foreach ($this->semesters as $semesters) {
            $start = strtotime($semesters['start']);
            $end = strtotime($semesters['end']);
            $now = strtotime(date('Y-m-d'));
            if ($now >= $start && $now <= $end) {
                return $semesters;
            }
        }
    }
}
