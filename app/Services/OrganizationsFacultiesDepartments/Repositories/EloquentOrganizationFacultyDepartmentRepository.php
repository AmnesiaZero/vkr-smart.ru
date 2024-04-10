<?php

namespace App\Services\OrganizationsFacultiesDepartments\Repositories;


use App\Models\OrganizationsFaculties;
use App\Models\OrganizationYear;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class EloquentOrganizationFacultyDepartmentRepository implements OrganizationFacultyDepartmentRepositoryInterface
{

    public function create(array $data): \Illuminate\Database\Eloquent\Model
    {
       return OrganizationsFaculties::query()->create($data);
    }

    public function get(int $organizationId):Collection
    {
        return OrganizationsFaculties::query()->where('organization_id','=',$organizationId)->get();
    }
}
