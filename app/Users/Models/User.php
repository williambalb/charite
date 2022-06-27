<?php

declare(strict_types=1);

namespace App\Users\Models;

use App\Roles\Models\Role;
use App\Users\Models\Addresses\Address;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model implements Authenticatable
{
    use AuthenticableTrait;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'document', 'role_id', 'api_key'];
    protected $hidden = ['password'];

    public function address(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function role(): HasOne
    {
        return $this->hasOne(Role::class);
    }
}
