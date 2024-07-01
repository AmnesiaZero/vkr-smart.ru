<?php

namespace App\Services\Roles\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RoleRepositoryInterface
{
    /**
     * @param string $slug
     * @return Model
     */
    public function find(string $slug): Model;

    /**
     * @param array $data
     * @return Collection
     */
    public function search(array $data): Collection;

}
