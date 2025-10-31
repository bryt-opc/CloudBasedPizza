<?php

namespace App\Traits;

use DateTimeInterface;

trait EpochTimestamps
{

    protected function serializeDate(DateTimeInterface $date): int
    {
        return $date->getTimestamp();
    }
}
