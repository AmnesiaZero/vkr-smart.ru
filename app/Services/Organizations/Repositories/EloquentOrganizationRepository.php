<?php

namespace App\Services\Organizations\Repositories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;

class EloquentOrganizationRepository implements OrganizationRepositoryInterface
{

    public function find(int $id): Model
    {
        return Organization::query()->find($id);
    }

    public function exist(int $id): bool
    {
        return Organization::query()->find($id)->exists();
    }
}
