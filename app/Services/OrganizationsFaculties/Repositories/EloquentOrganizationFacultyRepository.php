<?php

namespace App\Services\OrganizationsFaculties\Repositories;


use App\Models\OrganizationsFaculties;
use App\Models\OrganizationYear;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class EloquentOrganizationFacultyRepository implements OrganizationFacultyRepositoryInterface
{

    public function create(array $data): \Illuminate\Database\Eloquent\Model
    {
       return OrganizationsFaculties::query()->create($data);
    }

    public function get(int $organizationId,int $year):Collection
    {
        return OrganizationsFaculties::query()->where('organization_id','=',$organizationId)
            ->where('')->get();
    }
}
