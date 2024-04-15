<?php

namespace App\Services\OrganizationsFaculties\Repositories;

use Illuminate\Database\Eloquent\Model;

interface OrganizationFacultyRepositoryInterface
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
    public function update(int $id, array $data):int;

    /**
     * Мягкое удаление
     * @param int $id
     * @return bool
     */
    public function destroy(int $id): bool;
}
