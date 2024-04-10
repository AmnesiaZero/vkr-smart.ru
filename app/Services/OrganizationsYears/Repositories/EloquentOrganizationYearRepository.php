<?php

namespace App\Services\OrganizationsYears\Repositories;

use App\Models\OrganizationYear;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class EloquentOrganizationYearRepository implements OrganizationYearRepositoryInterface
{

    public function create(array $data): Model
    {

        return OrganizationYear::query()->create($data);
    }


    public function get(int $organizationId):Collection
    {
        return OrganizationYear::query()->where('organization_id','=',$organizationId)->get();
    }
}
