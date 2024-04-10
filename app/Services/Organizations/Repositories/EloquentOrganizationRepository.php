<?php

namespace App\Services\Organizations\Repositories;

use App\Models\Organization;

class EloquentOrganizationRepository implements OrganizationRepositoryInterface
{

    public function first(array $params): null|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder
    {
        $query = Organization::query();
        foreach ($params as $column => $value) {
            $query->where($column, '=', $value);
        }
        return $query->first();
    }
}
