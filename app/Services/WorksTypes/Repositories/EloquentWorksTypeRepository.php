<?php

namespace App\Services\WorksTypes\Repositories;

use App\Models\WorksType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentWorksTypeRepository implements WorksTypeRepositoryInterface
{

    public function create(array $data): Model
    {
        return WorksType::query()->create($data);
    }

    public function get(int $organizationId): Collection
    {
        return WorksType::query()->where('organization_id', '=', $organizationId)->get();
    }

    public function delete(int $id): bool
    {
        return WorksType::query()->find($id)->delete();
    }
}
