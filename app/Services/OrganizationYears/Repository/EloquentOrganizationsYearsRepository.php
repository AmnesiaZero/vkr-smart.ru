<?php

namespace App\Services\OrganizationYears\Repository;

use App\Models\OrganizationsYears;

class EloquentOrganizationsYearsRepository implements OrganizationsYearsInterface
{

    public function create(array $data): void
    {
        OrganizationsYears::query()->create($data);
    }
}
