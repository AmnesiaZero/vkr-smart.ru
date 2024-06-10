<?php

namespace App\Services\Departments\Repositories;


use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentDepartmentRepository implements DepartmentRepositoryInterface
{

    public function create(array $data): Model
    {
        return Department::query()->create($data);
    }

    public function getByYearId(int $yearId): Collection
    {
        return Department::query()->where('year_id', '=', $yearId)->get();
    }

    public function get(int $facultyId): Collection
    {
        return Department::query()->where('faculty_id', '=', $facultyId)->get();
    }

    public function update(int $id, array $data): int
    {
        return Department::query()->where('id', '=', $id)->update($data);
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }

    public function find(int $id): Model
    {
        return Department::query()->find($id);
    }

    public function exist(int $id): bool
    {
        return Department::query()->where('id', '=', $id)->exists();
    }

    public function getProgramSpecialties(int $id)
    {
        $department = Department::with('programs.programSpecialties')
            ->find($id);
        return $department->programs->map(function ($program) {
            return $program->programSpecialties;
        })->collapse();
    }
}
