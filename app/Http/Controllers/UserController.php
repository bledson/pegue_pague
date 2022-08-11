<?php

namespace App\Http\Controllers;

use App\Contracts\UserService;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{

    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function create(CreateUserRequest $request)
    {
        $token = $this->userService->create($request->validated());

        if (is_null($token)) {
            return response(null, 500);
        }

        return response(['token' => $token]);
    }
}
