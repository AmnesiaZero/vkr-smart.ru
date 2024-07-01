<?php

namespace App\Services\InviteCodes\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface InviteCodeRepositoryInterface
{
    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;


    /**
     * @param int $organizationId
     * @return mixed
     */
    public function get(int $organizationId, int $pageNumber, int $type): LengthAwarePaginator;


    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id): Model;

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id, array $data): bool;

    /**
     * @param int $id
     * @param int $code
     * @return bool
     */
    public function login(int $id, int $code): bool;

    /**
     * @param int $organizationId
     * @param int $type
     * @return bool
     */
    public function delete(int $organizationId, int $type):bool;
}
