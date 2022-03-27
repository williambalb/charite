<?php

declare(strict_types=1);

namespace App\Items\Models\ItemImages;

use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'item_images';
    protected $fillable = ['path', 'item_id'];
}