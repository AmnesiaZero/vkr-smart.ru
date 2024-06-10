<?php

namespace App\Services\OrganizationsYears\Repositories;

use App\Models\OrganizationYear;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentOrganizationYearRepository implements OrganizationYearRepositoryInterface
{

    public function create(array $data): Model
    {
        return OrganizationYear::query()->create($data);
    }

    public function update(int $id, array $data): int
    {
        return OrganizationYear::query()->where('id', '=', $id)->update($data);
    }

    public function getByYearNumber(int $year, int $userId): Model
    {
        return OrganizationYear::query()->where('user_id', '=', $userId)->first();
    }

    public function delete(int $id): bool
    {
        return OrganizationYear::query()->find($id)->delete();
    }

    public function find($id): Model
    {
        return OrganizationYear::query()->find($id);
    }

    public function copy(int $id): Model
    {
        return OrganizationYear::query()->where('id', '=', $id)->first()->duplicate();
    }

    public function findWithInfo(int $id): Model
    {
        return OrganizationYear::with('faculties.departments.programs.programSpecialties')->find($id);
    }

    public function all(int $organizationId): Collection
    {
        return OrganizationYear::query()->where('organization_id', '=', $organizationId)
            ->with('departments.programs.programSpecialties')->get();

    }

    public function get(int $organizationId): Collection
    {
        return OrganizationYear::with('departments')->where('organization_id', '=', $organizationId)->get();
    }
}
