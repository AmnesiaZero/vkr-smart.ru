<?php

namespace App\Services\OrganizationsFaculties\Repositories;


use App\Models\OrganizationFaculty;
use App\Models\OrganizationYear;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class EloquentOrganizationFacultyRepository implements OrganizationFacultyRepositoryInterface
{

    public function create(array $data): \Illuminate\Database\Eloquent\Model
    {
       return OrganizationFaculty::query()->create($data);
    }

    public function get(int $yearId):Collection
    {
        return OrganizationFaculty::query()->where('year_id','=',$yearId)->get();
    }

    public function update(int $id, array $data): int
    {
        return OrganizationFaculty::query()->where('id' ,'=',$id)->update($data);
    }

    public function destroy(int $id): bool
    {
        Log::debug('id = '.$id);
        return OrganizationFaculty::query()->find($id)->delete();
    }
}
