<?php

namespace App\Http\Requests;

use App\Enums\EmployeeLeaveStatusEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateLeaveRequest extends FormRequest
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
        $status = [
            EmployeeLeaveStatusEnum::PENDING->value,
            EmployeeLeaveStatusEnum::APPROVED->value,
            EmployeeLeaveStatusEnum::REJECTED->value,
        ];

        return [
            'comment' => 'nullable|string|max:255',
            'status' => 'required|string|in:' . implode(',', $status),
        ];
    }
}
