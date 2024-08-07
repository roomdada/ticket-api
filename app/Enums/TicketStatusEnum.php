<?php

namespace App\Enums;

use Essa\APIToolKit\Enum\Enum;

class TicketStatusEnum extends Enum
{
    const ACTIVE = 'active';
    const VALIDATED = 'validated';
    const EXPIRED = 'expired';
    const CANCELLED = 'cancelled';
}