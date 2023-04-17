<?php

namespace App\Repositories;

use App\Models\User;

class EloquentUserRepository implements UserRepository
{
    public function findByEmail(string $email): ?User
    {
        return User::where('email', $email)->first();
    }

    public function create(array $userData): User
    {
        return User::create($userData);
    }
}