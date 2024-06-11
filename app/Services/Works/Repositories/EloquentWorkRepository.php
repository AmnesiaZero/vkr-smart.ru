<?php

namespace App\Services\Works\Repositories;

use App\Models\Work;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentWorkRepository implements WorkRepositoryInterface
{

    public function get(int $organizationId): Collection
    {
        return Work::with('specialty')->where('organization_id', '=', $organizationId)->get();
    }

    public function create(array $data): Model
    {
        return Work::query()->create($data);
    }

    public function find(int $id): Model
    {
        return Work::with('specialty')->find($id);
    }
}
