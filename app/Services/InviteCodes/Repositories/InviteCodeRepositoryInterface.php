<?php

namespace App\Services\InviteCodes\Repositories;

use App\Models\InviteCode;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
    public function get(int $organizationId):Collection;


    /**
     * @param int $id
     * @return mixed
     */
    public function find(int $id):Model;

    /**
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update(int $id,array $data):bool;

    /**
     * @param int $id
     * @param int $code
     * @return bool
     */
    public function login(int $id,int $code):bool;
}
