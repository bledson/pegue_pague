<?php

namespace App\Providers;

use App\Contracts\MoneyTransferNotificationService;
use App\Contracts\MoneyTransferService;
use App\Contracts\UserRepository;
use App\Contracts\UserService;
use App\Repositories\RelationalUserRepository;
use App\Services\ApiUserService;
use App\Services\EmailMoneyTransferNotificationService;
use App\Services\InternalMoneyTransferService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(MoneyTransferService::class, InternalMoneyTransferService::class);
        $this->app->bind(MoneyTransferNotificationService::class, EmailMoneyTransferNotificationService::class);
        $this->app->bind(UserService::class, ApiUserService::class);
        $this->app->bind(UserRepository::class, RelationalUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
