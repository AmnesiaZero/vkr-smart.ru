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
}
