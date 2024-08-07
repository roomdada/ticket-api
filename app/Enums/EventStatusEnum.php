<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;

class EventStatusEnum extends Enum
{
    const UPCOMING = 'upcoming';
    const CANCELLED = 'cancelled';
    const COMPLETED = 'completed';
}