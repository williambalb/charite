<?php

namespace App\Items\Providers;

use App\Items\Models\ItemRepositoryInterface;
use App\Items\Repositories\ItemRepository;
use Illuminate\Support\ServiceProvider;

class ItemServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ItemRepositoryInterface::class, ItemRepository::class);
    }

    public function boot()
    {
        //
    }
}
