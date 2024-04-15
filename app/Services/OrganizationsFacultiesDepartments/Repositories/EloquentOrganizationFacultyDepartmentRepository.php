<?php

namespace App\Services\OrganizationsFacultiesDepartments\Repositories;


use App\Models\OrganizationFacultyDepartment;
use App\Models\OrganizationFaculty;
use App\Models\OrganizationYear;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class EloquentOrganizationFacultyDepartmentRepository implements OrganizationFacultyDepartmentRepositoryInterface
{

    public function create(array $data): \Illuminate\Database\Eloquent\Model
    {
       return OrganizationFacultyDepartment::query()->create($data);
    }

    public function get(int $facultyId):Collection
    {
        return OrganizationFacultyDepartment::query()->where('organization_id','=',$facultyId)->get();
    }
}
