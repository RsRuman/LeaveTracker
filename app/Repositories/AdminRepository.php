<?php

namespace App\Repositories;

use App\Interfaces\AdminInterface;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AdminRepository implements AdminInterface
{
    public function getEmployees(int $perPage): LengthAwarePaginator
    {
        return User::query()
            ->where('type', 'employee')
            ->paginate($perPage);
    }

    public function updateEmployeeStatus(string $id, string $status): bool|int
    {
        return User::query()
            ->findOrFail($id)
            ->update(['status' => $status]);
    }
}
