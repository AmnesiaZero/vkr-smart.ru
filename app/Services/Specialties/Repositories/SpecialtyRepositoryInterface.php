<?php

namespace App\Services\Specialties\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface SpecialtyRepositoryInterface
{
    /**
     * Создать новую специализацию для кафедры
     * @param array $data
     * @return mixed
     */
    public function create(array $data): Model;

    /**
     * Получить кафедры по id факультета
     * @param int $facultyId
     * @return Collection
     */
    public function get(int $facultyDepartmentId):Collection;


    /**
     * Обновить данные
     * @param int $id
     * @param array $data
     * @return int
     */
    public function update(int $id, array $data):int;

    /**
     * Мягкое удаление
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool;
}
