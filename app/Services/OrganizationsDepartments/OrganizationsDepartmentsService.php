<?php

namespace App\Services\OrganizationsDepartments;

use App\Services\OrganizationsDepartments\Repository\EloquentOrganizationsDepartmentsRepository;
use App\Services\OrganizationsYears\Repository\EloquentOrganizationsYearsRepository;
use App\Services\Services;
use Illuminate\Support\Facades\Log;

class OrganizationsDepartmentsService extends Services
{
    public EloquentOrganizationsDepartmentsRepository $_organizationsDepartmentsRepository;

    public function __construct()
    {
        $this->_organizationsDepartmentsRepository = new EloquentOrganizationsDepartmentsRepository();
    }

    public function create(array $data): void
   {
      $this->_organizationsDepartmentsRepository->create($data);
   }
}
