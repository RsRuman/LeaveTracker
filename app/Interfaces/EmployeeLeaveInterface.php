<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface EmployeeLeaveInterface
{
    public function store(Array $data);

    public function histories(Request $request, int $perPage);
}
