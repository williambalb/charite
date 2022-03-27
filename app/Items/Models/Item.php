<?php

declare(strict_types=1);

namespace App\Items\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';
    protected $fillable = ['name', 'description', 'category_id', 'user_id'];
}