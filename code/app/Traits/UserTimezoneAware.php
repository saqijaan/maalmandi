<?php

namespace App\Traits;

use Illuminate\Support\Carbon;
use DateTimeInterface;

trait UserTimezoneAware
{
    /**
     * Return a timestamp as DateTime object.
     *
     * @param  mixed  $value
     * @return \Illuminate\Support\Carbon
     */
    protected function asDateTime($value)
    {
        $timezone = config('app.timezone');

        if ($value instanceof Carbon) {
            
            return $value->timezone($timezone);
        }

        if ($value instanceof DateTimeInterface) {
            
            return new Carbon(
                $value->format('Y-m-d H:i:s.u'), $timezone
            );
        }

        if (is_numeric($value)) {
            return Carbon::createFromTimestamp($value)->timezone($timezone);
        }

        if ($this->isStandardDateFormat($value)) {
            
            return Carbon::createFromFormat('Y-m-d', $value)->startOfDay()->timezone($timezone);
        }

        return Carbon::createFromFormat(
            str_replace('.v', '.u', $this->getDateFormat()), $value,'UTC'
        )->setTimezone($timezone);
    }
}