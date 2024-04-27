<?php

namespace App\Services\Programs\Repositories;

use App\Models\Program;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentProgramRepository implements ProgramRepositoryInterface
{

    public function create(array $data): Model
    {
        return Program::query()->create($data);
    }

    public function update(int $id, array $data): int
    {
        return Program::query()->find($id)->update($data);
    }

    public function find(int $id): Model
    {
        return Program::query()->find($id);
    }

    public function delete(int $id): bool
    {
        return Program::query()->find($id)->delete();
    }

    public function getByYearId(int $yearId): Collection
    {
        return Program::query()->where('year_id', '=', $yearId)->get();
    }

    public function get(int $departmentId): Collection
    {
        return Program::query()->where('department_id', '=', $departmentId)->get();
    }
}
