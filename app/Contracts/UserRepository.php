<?php

namespace App\Contracts;

use App\Models\User;

interface UserRepository
{
    public function create(array $data): User|null;
}
