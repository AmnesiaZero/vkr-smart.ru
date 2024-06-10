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
     * @return Collection
     */
    public function all(): Collection;


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
}
