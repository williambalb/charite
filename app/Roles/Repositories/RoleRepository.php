<?php

declare(strict_types=1);

namespace App\Roles\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Roles\Models\Role;
use App\Roles\Models\RoleRepositoryInterface;

class RoleRepository extends BaseRepository implements RoleRepositoryInterface
{
    protected string $model = Role::class;
}
