<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface AdminInterface
{
    public function getEmployees(int $perPage);

    public function updateEmployeeStatus(string $id, string $status);

    public function getLeaveRequest(Request $request, int $perPage);

    public function updateLeaveRequest(string $id, string $status, ?string $comment = null);
}
