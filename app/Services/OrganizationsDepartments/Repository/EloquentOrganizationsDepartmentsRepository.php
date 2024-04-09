<?php

namespace App\Services\OrganizationsDepartments\Repository;


use App\Models\OrganizationsDepartment;
use Illuminate\Support\Facades\Log;

class EloquentOrganizationsDepartmentsRepository implements OrganizationsDepartmentsInterface
{

    public function create(array $data): void
    {
        OrganizationsDepartment::query()->create($data);
    }
}
