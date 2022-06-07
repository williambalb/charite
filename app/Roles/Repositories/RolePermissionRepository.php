<?php

declare(strict_types=1);

namespace App\Roles\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Roles\Models\RolePermission;
use App\Roles\Models\RolePermissionRepositoryInterface;

class RolePermissionRepository extends BaseRepository implements RolePermissionRepositoryInterface
{
    protected string $model = RolePermission::class;
}
