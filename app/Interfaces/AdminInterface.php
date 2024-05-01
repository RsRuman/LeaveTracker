<?php

namespace App\Interfaces;

interface AdminInterface
{
    public function getEmployees(int $perPage);
}
