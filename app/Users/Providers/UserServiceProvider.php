<?php

declare(strict_types=1);

namespace App\Users\Providers;

use App\Users\Models\UserRepositoryInterface;
use App\Users\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    public function boot()
    {
        //
    }
}
