<?php

namespace App\Enums;

enum EmployeeLeaveStatusEnum: string
{
    case PENDING  = 'pending';

    case APPROVED = 'approved';

    case REJECTED = 'rejected';
}
