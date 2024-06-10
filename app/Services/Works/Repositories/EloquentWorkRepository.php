<?php

namespace App\Services\Works\Repositories;

use App\Models\Work;
use Illuminate\Database\Eloquent\Collection;

class EloquentWorkRepository implements WorkRepositoryInterface
{

    public function get(int $organizationId): Collection
    {
        return Work::query()->where('organization_id', '=', $organizationId)->get();
    }
}
