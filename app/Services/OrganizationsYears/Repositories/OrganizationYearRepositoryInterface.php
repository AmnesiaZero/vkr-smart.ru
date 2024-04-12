<?php

namespace App\Services\OrganizationsYears\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\Collection;

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
     * Обновить год
     * @param int $id
     * @param array $data
     * @return mixed
     */
     public function update(int $id,array $data):int;
}
