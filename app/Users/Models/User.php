<?php

declare(strict_types=1);

namespace App\Users\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password', 'document', 'role_id', 'address_id'];
}
