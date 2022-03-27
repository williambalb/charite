<?php

declare(strict_types=1);

namespace App\Base\Repositories;

use App\Base\Models\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseRepositoryInterface
{
    protected string $model;

    public function all(int $limit = 20, array $orderBy = []): LengthAwarePaginator
    {
        $results = $this->model::query();

        foreach ($orderBy as $key => $value) {
            if (strstr($key, '-')) {
                $key = substr($key, 1);
            }

            $results->orderBy($key, $value);
        }

        return $results->paginate($limit)->appends([
            'order_by' => implode(',', array_keys($orderBy)),
            'limit' => $limit
        ]);
    }

    public function create(array $data): Model
    {
        return $this->model::create($data);
    }

    public function find(int $id): Model
    {
        return $this->model::findOrFail($id);
    }

    public function delete(int $id): bool
    {
        $result = $this->model::destroy($id);
        return (bool) $result;
    }

    public function update(int $id, array $data): bool
    {
        $result = $this->model::find($id)->update($data);
        return (bool) $result;
    }

    public function search(string $searchValue, array $searchFields, array $orderBy = [], int $limit = 20): LengthAwarePaginator
    {
        $results = $this->model::where($searchFields[0], 'like', '%'.$searchValue.'%');

        if (count($searchFields) > 1) {
            foreach ($searchFields as $field) {
                $results->orWhere($field, 'like', '%'.$searchValue.'%');
            }
        }

        foreach ($orderBy as $key => $value) {
            if (strstr($key, '-')) {
                $key = substr($key, 1);
            }

            $results->orderBy($key, $value);
        }

        return $results->paginate($limit)->appends([
            'order_by' => implode(',', array_keys($orderBy)),
            'limit' => $limit,
            'q' => $searchValue
        ]);
    }
}
