<?php

namespace App\Services\ScientificSupervisors\Repositories;

use App\Models\ScientificSupervisor;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentScientificSupervisorRepository implements ScientificSupervisorRepositoryInterface
{

    public function create(array $data): Model
    {
        return ScientificSupervisor::query()->create($data);
    }

    public function get(int $organizationId): Collection
    {
        return ScientificSupervisor::query()->where('organization_id', '=', $organizationId)->get();
    }

    public function delete(int $id): bool
    {
        return ScientificSupervisor::query()->find($id)->delete();
    }
}
