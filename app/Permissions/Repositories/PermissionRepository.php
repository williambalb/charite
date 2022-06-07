<?php

declare(strict_types=1);

namespace App\Permissions\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Permissions\Models\Permission;
use App\Permissions\Models\PermissionRepositoryInterface;

class PermissionRepository extends BaseRepository implements PermissionRepositoryInterface
{
    protected string $model = Permission::class;
}
