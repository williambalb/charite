<?php

declare(strict_types=1);

namespace App\Items\Providers;

use App\Items\Models\ItemImages\ItemImageRepositoryInterface;
use App\Items\Repositories\ItemImageRepository;
use Illuminate\Support\ServiceProvider;

class ItemImageServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(ItemImageRepositoryInterface::class, ItemImageRepository::class);
    }

    public function boot()
    {
        //
    }
}
