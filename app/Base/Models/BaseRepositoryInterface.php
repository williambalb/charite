<?php

declare(strict_types=1);

namespace App\Base\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepositoryInterface
{
    public function all(): LengthAwarePaginator;
    public function create(array $data): Model;
    public function find(int $id): Model;
    public function delete(int $id): bool;
    public function update(int $id, array $data): bool;
    public function search(string $searchValue, array $searchFields): LengthAwarePaginator;
}
