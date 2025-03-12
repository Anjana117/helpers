<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{

    public static function format($date, $format = 'Y-m-d')
    {
        if (!$date) {
            return null;
        }

        return Carbon::parse($date)->format($format);
    }
}
