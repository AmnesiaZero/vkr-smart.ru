<?php

namespace App\Services\Comments\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface CommentRepositoryInterface
{
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
     * @param int $workId
     * @return mixed
     */
    public function get(int $workId):Collection;

    /**
     * @param int $id
     * @return bool
     */
    public function delete(int $id):bool;
}
