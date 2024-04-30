<?php

namespace App\Http\Requests;

use App\Enums\EmployeeLeaveTypeEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LeaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $types = [
            EmployeeLeaveTypeEnum::CASUAL->value,
            EmployeeLeaveTypeEnum::SICK->value,
            EmployeeLeaveTypeEnum::EMERGENCY->value
        ];

        return [
            'type'       => 'required|string|in:' . implode(',', $types),
            'start_date' => 'required|date|date_format:Y-m-d|after_or_equal:today',
            'end_date'   => 'required|date|date_format:Y-m-d|after_or_equal:start_date',
            'reason'     => 'required|string|max:255'
        ];
    }
}
