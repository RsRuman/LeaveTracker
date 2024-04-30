<?php

namespace App\Interfaces;

interface EmployeeLeaveInterface
{
    public function store(Array $data);

    public function histories(int $perPage);
}
