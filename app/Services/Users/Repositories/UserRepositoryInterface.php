<?php

namespace App\Services\Users\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface UserRepositoryInterface
{

    /**
     * Получить по email
     * @param string $email
     * @return Model
     */
    public function getByEmail(string $email): Model;


    /**
     * Проверить, есть ли этот email
     * @param string $email
     * @return bool
     */
    public function emailExist(string $email): bool;


    /**
     * Получить список пользователей по их организации
     * @param int $organizationId
     * @return Collection
     */
    public function get(int $organizationId): Collection;

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;

    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

}
