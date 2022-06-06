<?php

namespace App\Users\Providers;

use App\Users\Models\Addresses\AddressRepositoryInterface;
use App\Users\Repositories\AddressRepository;
use Illuminate\Support\ServiceProvider;

class AddressServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(AddressRepositoryInterface::class, AddressRepository::class);
    }

    public function boot()
    {
        //
    }
}
