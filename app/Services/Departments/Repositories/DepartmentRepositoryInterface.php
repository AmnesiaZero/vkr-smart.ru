<?php

namespace App\Services\Departments\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface DepartmentRepositoryInterface
{
    /**
     * Создать новый факультет для организации
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Model;

    /**
     * Получить кафедры по id факультета
     * @param int $facultyId
     * @return Collection
     */
    public function get(int $facultyId): Collection;

    /**
     * Получить по году
     * @param int $yearId
     * @return Collection
     */
    public function getByYearId(int $yearId): Collection;


    /**
     * Обновить данные
     * @param int $id
     * @param array $data
     * @return int
     */
    public function update(int $id, array $data): int;

    /**
     * Мягкое удаление
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;

    /**
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;

    /**
     * @param int $id
     * @return bool
     */
    public function exist(int $id): bool;

    /**
     * @param int $id
     * @return mixed
     */
    public function getProgramSpecialties(int $id);


}
