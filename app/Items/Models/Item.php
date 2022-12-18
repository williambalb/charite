<?php

declare(strict_types=1);

namespace App\Items\Models;

use App\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Item extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'items';
    protected $fillable = ['name', 'description', 'category_id', 'user_id'];
    protected $appends = ['user_name'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getUserNameAttribute(): string
    {
        return $this->user->name;
    }
}
