<?php

declare(strict_types=1);

namespace App\Roles\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';
    protected $fillable = ['name'];
}
