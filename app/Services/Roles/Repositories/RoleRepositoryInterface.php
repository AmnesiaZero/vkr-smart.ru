<?php

namespace App\Services\Roles\Repositories;

use Illuminate\Database\Eloquent\Model;

interface RoleRepositoryInterface
{
    /**
     * @param string $slug
     * @return mixed
     */
    public function find(string $slug): Model;

}
