<?php

namespace Tests\Unit;

use App\Contracts\UserRepository;
use App\Models\User;
use App\Services\ApiUserService;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase
{

    public function should_save_user()
    {
        $mock = $this->mock(UserRepository::class, function (MockInterface $mock) {
            $mock->shouldReceive('create')->once()->andReturn(new User(['id' => 1]));
        });
        $service = new ApiUserService($mock);
    }
}
