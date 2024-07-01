<?php

namespace App\Services\OrganizationsYears\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface OrganizationYearRepositoryInterface
{
    /**
     * Создать новый год для организации
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * Получить года организации
     * @param int $organizationId
     * @return Collection
     */
    public function get(int $organizationId): Collection;

    /**
     * Найти по id
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;

    /**
     * Обновить год
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id, array $data): int;

    /**
     * Получить год организации по его номеру
     * @param int $year
     * @param int $userId
     * @return mixed
     */
    public function getByYearNumber(int $year, int $userId): Model;

    /**
     * Мягкое удаление года
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @param int $id
     * @return mixed
     */
    public function copy(int $id): Model;


    /**
     * @param int $id
     * @return Model
     */
    public function findWithInfo(int $id): Model;


}
