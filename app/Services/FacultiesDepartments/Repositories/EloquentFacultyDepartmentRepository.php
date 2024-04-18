<?php

namespace App\Services\FacultiesDepartments\Repositories;


use App\Models\FacultyDepartment;
use App\Models\Faculty;
use App\Models\OrganizationYear;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

class EloquentFacultyDepartmentRepository implements FacultyDepartmentRepositoryInterface
{

    public function create(array $data): Model
    {
       return FacultyDepartment::query()->create($data);
    }

    public function get(int $facultyId):Collection
    {
        return FacultyDepartment::query()->where('organization_id','=',$facultyId)->get();
    }

    public function getByYearId(int $yearId):Collection
    {
        return FacultyDepartment::query()->where('year_id','=',$yearId)->get();
    }

    public function update(int $id, array $data): int
    {
        return FacultyDepartment::query()->where('id' ,'=',$id)->update($data);
    }

    public function destroy(int $id): bool
    {
        return FacultyDepartment::query()->find($id)->delete();
    }
}
