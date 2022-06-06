<?php

declare(strict_types=1);

namespace App\Users\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Users\Models\Addresses\Address;
use App\Users\Models\Addresses\AddressRepositoryInterface;

class AddressRepository extends BaseRepository implements AddressRepositoryInterface
{
    protected string $model = Address::class;
}
