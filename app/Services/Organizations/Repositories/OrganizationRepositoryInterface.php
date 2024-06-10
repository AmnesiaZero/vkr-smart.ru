<?php

namespace App\Services\Organizations\Repositories;

use Illuminate\Database\Eloquent\Model;

interface OrganizationRepositoryInterface
{

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;

    /**
     * @param int $id
     * @return bool
     */
    public function exist(int $id): bool;
}
