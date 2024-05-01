<?php

namespace App\Interfaces;

interface AdminInterface
{
    public function getEmployees(int $perPage);

    public function updateEmployeeStatus(string $id, string $status);
}
