<?php

declare(strict_types=1);

namespace App\Categories\Providers;

use App\Categories\Models\CategoryRepositoryInterface;
use App\Categories\Repositories\CategoryRepository;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
    }

    public function boot()
    {
        //
    }
}
