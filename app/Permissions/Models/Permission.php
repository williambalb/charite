<?php

declare(strict_types=1);

namespace App\Permissions\Models;

use App\Roles\Models\RolePermission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Permission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';
    protected $fillable = ['name'];

    public function rolePermission(): HasMany
    {
        return $this->hasMany(RolePermission::class);
    }
}
