<?php

namespace App\Repositories;

use App\Interfaces\EmployeeLeaveInterface;
use App\Models\EmployeeLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeLeaveRepository implements EmployeeLeaveInterface
{
    public function store(array $data)
    {
        return EmployeeLeave::create($data);
    }

    public function histories(Request $request, int $perPage)
    {
        return Auth::user()
            ->employeeLeaves()
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
}
