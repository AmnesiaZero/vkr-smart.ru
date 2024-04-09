<?php

namespace App\Services\OrganizationsYears\Repository;

use App\Models\OrganizationsYear;
use Illuminate\Support\Facades\Log;

class EloquentOrganizationsYearsRepository implements OrganizationsYearsInterface
{

    public function create(array $data): void
    {
        Log::debug('Вошёл в create у репы');
        OrganizationsYear::query()->create($data);
    }
}
