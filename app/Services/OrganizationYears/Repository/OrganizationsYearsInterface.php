<?php

namespace App\Services\OrganizationYears\Repository;

interface OrganizationsYearsInterface
{
    /**
     * Создать новый год для организации
     * @param array $data
     * @return mixed
     */
     public function create(array $data): void;
}
