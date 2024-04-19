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


    public function get(int $userId):Collection
    {
        return OrganizationYear::query()->where('user_id','=',$userId)->get();
    }

    public function update(int $id,array $data): int
    {
        return OrganizationYear::query()->where('id' ,'=',$id)->update($data);
    }


    public function getByYearNumber(int $year, int $userId): Model
    {
       return OrganizationYear::query()->where('user_id','=',$userId)->first();
    }


    public function find($id):Model
    {
        return OrganizationYear::query()->find($id);
    }


    public function delete(int $id):bool
    {
        return OrganizationYear::query()->find($id)->delete();
    }

    public function copy(int $id):Model
    {
        return OrganizationYear::query()->find($id)->replicate();
    }
}
