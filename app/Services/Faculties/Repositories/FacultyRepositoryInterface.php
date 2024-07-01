<?php

namespace App\Services\Faculties\Repositories;

use Illuminate\Database\Eloquent\Model;

interface FacultyRepositoryInterface
{
    /**
     * Создать новый факультет для организации
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Model;


    /**
     * Обновить данные факультета
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
     * Найти по id-шнику
     * @param int $id
     * @return Model
     */
    public function find(int $id): Model;

    /**
     * Получить id года
     * @param int $id
     * @return int
     */
    public function getYearId(int $id): int;
}
