<?php

namespace App\Services\AdditionalFiles\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface AdditionalFileRepositoryInterface
{
    /**
     * @param int $workId
     * @return Collection
     */
    public function get(int $workId):Collection;

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id):Model;


    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data):Model;

    /**
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id,array $data);

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id):bool;
}
