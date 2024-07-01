<?php

namespace App\Services\Faculties\Repositories;


use App\Models\Faculty;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentFacultyRepository implements FacultyRepositoryInterface
{

    public function create(array $data): \Illuminate\Database\Eloquent\Model
    {
        return Faculty::query()->create($data);
    }

    public function get(int $yearId): Collection
    {
        return Faculty::query()->where('year_id', '=', $yearId)->get();
    }

    public function update(int $id, array $data): int
    {
        return Faculty::query()->where('id', '=', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return Faculty::query()->find($id)->delete();
    }

    public function find(int $id): Model
    {
        return Faculty::with(['departments'])->find($id);
    }

    public function getYearId(int $id): int
    {
        return Faculty::query()->select('year_id')->where('id', '=', $id)->value('year_id');
    }
}
