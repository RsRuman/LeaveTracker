<?php

namespace App\Enums;

enum UserStatusEnum: string
{
    case PENDING  = 'pending';
    case APPROVED = 'approved';
    case BLOCKED  = 'blocked';
}
