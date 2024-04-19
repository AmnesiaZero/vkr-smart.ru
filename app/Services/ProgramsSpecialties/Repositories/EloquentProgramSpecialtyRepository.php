<?php

namespace App\Services\ProgramsSpecialties\Repositories;

use App\Models\ProgramSpecialty;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentProgramSpecialtyRepository implements ProgramSpecialtyRepositoryInterface
{

    public function create(array $data): Model
    {
       return ProgramSpecialty::query()->create($data);
    }

    public function get(int $programId): Collection
    {
        return ProgramSpecialty::query()->where('program_id','=',$programId)->get();
    }

    public function find(int $id): Model
    {
        return ProgramSpecialty::query()->find($id);
    }

    public function update(int $id, array $data): int
    {
        return ProgramSpecialty::query()->find($id)->update($data);
    }

    public function delete(int $id): bool
    {
        return ProgramSpecialty::query()->find($id)->delete();
    }
}
