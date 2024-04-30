<?php

namespace App\Repositories;

use App\Interfaces\EmployeeLeaveInterface;
use App\Models\EmployeeLeave;
use Illuminate\Support\Facades\Auth;

class EmployeeLeaveRepository implements EmployeeLeaveInterface
{
    public function store(array $data)
    {
        return EmployeeLeave::create($data);
    }

    public function histories(int $perPage)
    {
        return Auth::user()
            ->employeeLeaves()
            ->paginate($perPage);
    }
}
