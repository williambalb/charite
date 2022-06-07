<?php

declare(strict_types=1);

namespace App\Roles\Providers;

use App\Roles\Models\RoleRepositoryInterface;
use App\Roles\Repositories\RoleRepository;
use Illuminate\Support\ServiceProvider;

class RoleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
    }

    public function boot()
    {
        //
    }
}
