<?php

namespace App\Services\Users\Repositories;

use App\Models\User;
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
}
