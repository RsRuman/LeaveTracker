<?php

namespace App\Models;

use App\Enums\EmployeeLeaveStatusEnum;
use App\Enums\EmployeeLeaveTypeEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EmployeeLeave extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'reason',
        'start_date',
        'end_date',
        'comments',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'type'   => EmployeeLeaveTypeEnum::class,
            'status' => EmployeeLeaveStatusEnum::class,
        ];
    }

    /**
     * user
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
