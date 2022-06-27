<?php

declare(strict_types=1);

namespace App\Users\Repositories;

use App\Base\Repositories\BaseRepository;
use App\Users\Models\User;
use App\Users\Models\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected string $model = User::class;

    public function getUserByEmail(string $email): User
    {
        return $this->model::where('email', $email)->first();
    }
}
