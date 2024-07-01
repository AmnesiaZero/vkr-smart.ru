<?php

namespace App\Services\AdditionalFiles\Repositories;

use App\Models\AdditionalFile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class EloquentAdditionalFileRepository implements AdditionalFileRepositoryInterface
{

    public function get(int $workId): Collection
    {
        return AdditionalFile::query()->where('work_id','=',$workId)->get();
    }


    public function create(array $data): Model
    {
        return AdditionalFile::query()->create($data);
    }

    public function update(int $id,array $data)
    {
        return $this->find($id)->update($data);
    }

    public function find(int $id): Model
    {
        return AdditionalFile::query()->find($id);
    }

    public function delete(int $id): bool
    {
        return $this->find($id)->delete();
    }
}
