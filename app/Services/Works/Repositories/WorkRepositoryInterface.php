<?php

namespace App\Services\Works\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface WorkRepositoryInterface
{

    /**
     * @param int $organizationId
     * @param int $pageNumber
     * @return LengthAwarePaginator
     */
    public function get(int $organizationId,int $pageNumber): LengthAwarePaginator;

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
     * @return LengthAwarePaginator
     */
    public function search(array $data):LengthAwarePaginator;

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id,array $data);
}
