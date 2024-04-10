<?php

namespace App\Services\OrganizationsFacultiesDepartments\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface OrganizationFacultyDepartmentRepositoryInterface
{
    /**
     * Создать новый факультет для организации
     * @param array $data
     * @return mixed
     */
     public function create(array $data): Model;

    /**
     * Получить кафедры
     * @param int $organizationId
     * @return Collection
     */
    public function get(int $organizationId):Collection;
}
