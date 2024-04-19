<?php

namespace App\Services\ProgramsSpecialties\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ProgramSpecialtyRepositoryInterface
{
    /**
     * Создать новый год для организации
     * @param array $data
     * @return Model
     */
    public function create(array $data): Model;

    /**
     * Получить года организации
     * @param int $programId
     * @return Collection
     */
    public function get(int $programId): Collection;


    /**
     * Найти по id
     * @param int $id
     * @return Model
     */
    public function find(int $id):Model;

    /**
     * Обновить год
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function update(int $id,array $data):int;


    /**
     * Мягкое удаление
     * @param int $id
     * @return bool
     */
    public function delete(int $id):bool;
}
