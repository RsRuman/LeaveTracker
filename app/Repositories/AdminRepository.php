<?php

namespace App\Repositories;

use App\Interfaces\AdminInterface;
use App\Models\EmployeeLeave;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class AdminRepository implements AdminInterface
{
    /**
     * Get all employee
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getEmployees(int $perPage): LengthAwarePaginator
    {
        return User::query()
            ->where('type', 'employee')
            ->paginate($perPage);
    }

    /**
     * Update user status
     * @param string $id
     * @param string $status
     * @return bool|int
     */
    public function updateEmployeeStatus(string $id, string $status): bool|int
    {
        return User::query()
            ->findOrFail($id)
            ->update(['status' => $status]);
    }

    /**
     * Get employee leaves
     * @param Request $request
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getLeaveRequest(Request $request, int $perPage): LengthAwarePaginator
    {
        return EmployeeLeave::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('reason','like', '%'. $request->input('search') .'%');
            })
            ->when($request->filled('status'), function ($query) use ($request) {
                $query->where('status', $request->input('status'));
            })
            ->when($request->filled('type'), function ($query) use ($request) {
                $query->where('type', $request->input('type'));
            })
            ->paginate($perPage);
    }

    /**
     * Update employee leave
     * @param string $id
     * @param string $status
     * @param string|null $comment
     * @return bool|int
     */
    public function updateLeaveRequest(string $id, string $status, ?string $comment = null): bool|int
    {
        return EmployeeLeave::query()
            ->findOrFail($id)
            ->update(['status' => $status, 'comments' => $comment]);
    }
}
