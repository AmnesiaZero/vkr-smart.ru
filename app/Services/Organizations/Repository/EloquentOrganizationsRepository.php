<?php

namespace App\Services\Organizations\Repository;

use App\Models\Organization;

class EloquentOrganizationsRepository implements OrganizationsRepositoryInterface
{

    public function first(array $params): null|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder
    {
        $query = Organization::query();
        foreach ($params as $column => $value){
            $query->where($column,'=',$value);
        }
        return $query->first();
    }
}
