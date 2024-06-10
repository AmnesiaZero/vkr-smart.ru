<?php

namespace App\Services\Works\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface WorkRepositoryInterface
{

    /**
     * @param int $organizationId
     * @return Collection
     */
    public function get(int $organizationId): Collection;
}
