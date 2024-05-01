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
}
