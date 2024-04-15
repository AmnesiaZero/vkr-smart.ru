<?php

namespace App\Services\OrganizationsYears\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;
use PhpParser\Node\Expr\AssignOp\Mod;

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
     * @param int $userId
     * @return Collection
     */
     public function get(int $userId): Collection;

    /**
     * Обновить год
     * @param int $id
     * @param array $data
     * @return mixed
     */
     public function update(int $id,array $data):int;

    /**
     * Получить год организации по его номеру
     * @param int $year
     * @param int $userId
     * @return mixed
     */
     public function getByYearNumber(int $year,int $userId):Model;

    /**
     * Мягкое удаление года
     * @param int $id
     * @return bool
     */
     public function destroy(int $id):bool;


}
