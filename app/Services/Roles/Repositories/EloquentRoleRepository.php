<?php

namespace App\Services\Roles\Repositories;

use Illuminate\Database\Eloquent\Model;

class EloquentRoleRepository implements RoleRepositoryInterface
{

    public function find(string $slug): Model
    {
        return config('roles.models.role')::where('slug', '=', $slug)->first();
    }
}
