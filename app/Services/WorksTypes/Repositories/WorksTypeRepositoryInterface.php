<?php

namespace App\Services\WorksTypes\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface WorksTypeRepositoryInterface
{
    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * @param int $organizationId
     * @return Collection
     */
    public function get(int $organizationId): Collection;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id):bool;
}
