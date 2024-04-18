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

    public function get(int $facultyDepartmentId): Collection
    {
       return Specialty::query()->where('faculty_department_id','=',$facultyDepartmentId)->get();
    }

    public function update(int $id, array $data): int
    {
        return Specialty::query()->find($id)->update($data);
    }

    public function destroy(int $id): bool
    {
        return Specialty::query()->find($id)->delete();
    }
}
