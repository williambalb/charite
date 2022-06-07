<?php

declare(strict_types=1);

namespace App\Permissions\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';
    protected $fillable = ['name'];
}
