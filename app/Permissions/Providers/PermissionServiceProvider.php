<?php

declare(strict_types=1);

namespace App\Permissions\Providers;

use App\Permissions\Models\PermissionRepositoryInterface;
use App\Permissions\Repositories\PermissionRepository;
use Illuminate\Support\ServiceProvider;

class PermissionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);
    }

    public function boot()
    {
        //
    }
}
