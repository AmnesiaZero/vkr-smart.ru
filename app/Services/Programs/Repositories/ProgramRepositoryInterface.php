<?php

namespace App\Services\Programs\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ProgramRepositoryInterface
{
    /**
     * Создать новый год для организации
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * Получить года организации
     * @param int $departmentId
     * @return Collection
     */
    public function get(int $departmentId): Collection;

    /**
     * Получить по году
     * @param int $yearId
     * @return Collection
     */
    public function getByYearId(int $yearId): Collection;

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
     * Мягкое удаление года
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
