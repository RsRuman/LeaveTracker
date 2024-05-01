<?php

namespace App\Providers;

use App\Interfaces\AdminInterface;
use App\Interfaces\AuthenticationInterface;
use App\Interfaces\EmployeeLeaveInterface;
use App\Repositories\AdminRepository;
use App\Repositories\AuthenticationRepository;
use App\Repositories\EmployeeLeaveRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthenticationInterface::class, AuthenticationRepository::class);
        $this->app->bind(EmployeeLeaveInterface::class, EmployeeLeaveRepository::class);
        $this->app->bind(AdminInterface::class, AdminRepository::class);
    }
}
