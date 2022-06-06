<?php

declare(strict_types=1);

namespace App\Users\Models\Addresses;

use App\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Address extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'addresses';
    protected $fillable = ['name', 'state', 'city', 'district', 'street', 'number', 'complement', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
