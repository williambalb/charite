<?php

declare(strict_types=1);

namespace App\Roles\Models;

use App\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';
    protected $fillable = ['name'];

    public function rolePermission(): HasMany
    {
        return $this->hasMany(RolePermission::class);
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }
}
