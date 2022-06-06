<?php

declare(strict_types=1);

namespace App\Items\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Items\Models\ItemImages\ItemImage;
use App\Items\Models\ItemImages\ItemImageRepositoryInterface;

class ItemImageRepository extends BaseRepository implements ItemImageRepositoryInterface
{
    protected string $model = ItemImage::class;
}
