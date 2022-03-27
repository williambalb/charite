<?php

declare(strict_types=1);

namespace App\Categories\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';
    protected $fillable = ['name', 'parent_id'];
}
