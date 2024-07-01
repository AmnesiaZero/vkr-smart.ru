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
     * @param int $userType
     * @return LengthAwarePaginator
     */
    public function get(int $organizationId,int $pageNumber,int $userType): LengthAwarePaginator;

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

    /**
     * @param int $id
     * @return mixed
     */
    public function copy(int $id);

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id):bool;

    /**
     * @param int $id
     * @return bool
     */
    public function destroy(int $id):bool;

    /**
     * @param int $id
     * @return mixed
     */
    public function restore(int $id);
}
