<?php

namespace App\Http\Requests;

use App\Enums\UserStatusEnum;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeStatusRequest extends FormRequest
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
            UserStatusEnum::PENDING->value,
            UserStatusEnum::APPROVED->value,
            UserStatusEnum::BLOCKED->value,
        ];

        return [
            'status' => 'required|string|in:' . implode(',', $status),
        ];
    }
}
