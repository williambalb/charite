<?php

declare(strict_types=1);

namespace App\Categories\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Categories\Models\Category;
use App\Categories\Models\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    protected string $model = Category::class;
}
