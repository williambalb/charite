<?php

declare(strict_types=1);

namespace App\Users\Models;

use App\Users\Models\Addresses\Address;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'document', 'role_id'];

    public function address(): HasMany
    {
        return $this->hasMany(Address::class);
    }
}
