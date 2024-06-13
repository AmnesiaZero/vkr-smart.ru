<?php

namespace App\Services\Works\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface WorkRepositoryInterface
{

    /**
     * @param int $organizationId
     * @return Collection
     */
    public function get(int $organizationId): Collection;

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data):Model;

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id):Model;

    /**
     * @param array $data
     * @return Collection
     */
    public function search(array $data):Collection;
}
