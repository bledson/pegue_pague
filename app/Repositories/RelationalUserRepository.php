<?php

namespace App\Repositories;

use App\Contracts\UserRepository;
use App\Models\User;

class RelationalUserRepository implements UserRepository
{

    public function create(array $data): User|null
    {
        return User::create($data);
    }
}
