<?php

namespace App\Services;

use App\Contracts\UserRepository;
use App\Contracts\UserService;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ApiUserService implements UserService
{

    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create(array $data)
    {
        $data['holder_id'] = $this->sanitizeHolderId($data);
        $data['password'] = Hash::make($data['password']);

        $user = $this->userRepository->create($data);

        return $user->createToken('access_token')->plainTextToken;
    }

    /**
     * @param $data
     * @return array|string|string[]
     */
    private function sanitizeHolderId($data): string|array
    {
        return str_replace(['.', '-', '/'], '', $data['holder_id']);
    }
}
