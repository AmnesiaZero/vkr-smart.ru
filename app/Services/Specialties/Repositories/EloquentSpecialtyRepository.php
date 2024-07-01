<?php

namespace App\Services\Specialties\Repositories;

use App\Models\Specialty;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentSpecialtyRepository implements SpecialtyRepositoryInterface
{

    public function create(array $data): Model
    {
        return Specialty::query()->create($data);
    }

    public function all(): Collection
    {
        return Specialty::query()->get();
    }

    public function update(int $id, array $data): int
    {
        return Specialty::query()->find($id)->update($data);
    }

    public function find(int $id): Model
    {
        return Specialty::query()->find($id);
    }

    public function delete(int $id): bool
    {
        return Specialty::query()->find($id)->delete();
    }

    public function exist(int $id): bool
    {
        return Specialty::query()->find($id)->exists();
    }
}
