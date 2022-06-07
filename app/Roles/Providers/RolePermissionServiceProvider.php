<?php

declare(strict_types=1);

namespace App\Roles\Providers;

use App\Roles\Models\RolePermissionRepositoryInterface;
use App\Roles\Repositories\RolePermissionRepository;
use Illuminate\Support\ServiceProvider;

class RolePermissionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(RolePermissionRepositoryInterface::class, RolePermissionRepository::class);
    }

    public function boot()
    {
        //
    }
}
