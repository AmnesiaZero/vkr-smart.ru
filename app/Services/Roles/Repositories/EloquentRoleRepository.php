<?php

namespace App\Services\Roles\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use jeremykenedy\LaravelRoles\Models\Role;

class EloquentRoleRepository implements RoleRepositoryInterface
{

    public function find(string $slug): Model
    {
        return config('roles.models.role')::where('slug', '=', $slug)->first();
    }

    public function search(array $data): Collection
    {
        $query = Role::query();
        if (isset($data['organization_id'])) {
            $query = $query->where('organization_id', '=', $data['organization_id']);
        }
        if (isset($data['name'])) {
            $query = $query->where('name', 'like', '%' . $data['name'] . '%');
        }
        return $query->get();
    }
}
