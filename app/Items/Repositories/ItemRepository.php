<?php

declare(strict_types=1);

namespace App\Items\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Items\Models\Item;
use App\Items\Models\ItemRepositoryInterface;

class ItemRepository extends BaseRepository implements ItemRepositoryInterface
{
    protected string $model = Item::class;
}
