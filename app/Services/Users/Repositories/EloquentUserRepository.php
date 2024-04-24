<?php

namespace App\Services\Users\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentUserRepository implements UserRepositoryInterface
{
    public function getByEmail(string $email): Model
    {
        return User::query()->where('email', '=', $email)->first();
    }

    public function emailExist(string $email): bool
    {
        return User::query()->where('email', '=', $email)->exists();
    }


    public function get(int $organizationId): Collection
    {
        return User::query()->where('organization_id', '=', $organizationId)->get();
    }

    public function find(int $id): Model
    {
        return User::query()->find($id);
    }

    public function create(array $data): Model
    {
        return User::query()->create($data);
    }
}
