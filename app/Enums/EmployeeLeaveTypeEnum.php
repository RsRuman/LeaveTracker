<?php

namespace App\Enums;

enum EmployeeLeaveTypeEnum: string
{
    case CASUAL    = 'casual';
    case SICK      = 'sick';
    case EMERGENCY = 'emergency';

}
