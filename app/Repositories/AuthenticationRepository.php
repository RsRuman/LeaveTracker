<?php

namespace App\Repositories;

use App\Interfaces\AuthenticationInterface;
use App\Models\User;

class AuthenticationRepository implements AuthenticationInterface
{
    /**
     * Register an user
     * @param array $data
     * @return mixed
     */
    public function register(array $data): mixed
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
    }

    public function login(array $data)
    {
        // TODO: Implement login() method.
    }
}
