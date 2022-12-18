<?php

declare(strict_types=1);

namespace App\Users\Models;

use App\Items\Models\Item;
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
    protected $fillable = ['name', 'email', 'password', 'document', 'role_id'];
    protected $hidden = ['password', 'api_key'];

    public function address(): HasMany
    {
        return $this->hasMany(Address::class);
    }

    public function item(): HasMany
    {
        return $this->hasMany(Item::class);
    }

    public function role(): HasOne
    {
        return $this->hasOne(Role::class);
    }
}
