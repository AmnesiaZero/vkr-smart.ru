<?php

namespace App\Services\OrganizationsDepartments\Repository;

interface OrganizationsDepartmentsInterface
{
    /**
     * Создать новый год для организации
     * @param array $data
     * @return mixed
     */
     public function create(array $data): void;
}
