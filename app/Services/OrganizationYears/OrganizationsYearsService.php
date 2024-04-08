<?php

namespace App\Services\OrganizationYears;

use App\Services\OrganizationYears\Repository\EloquentOrganizationsYearsRepository;
use App\Services\Services;
use Illuminate\Http\Request;

class OrganizationsYearsService extends Services
{
    public EloquentOrganizationsYearsRepository $_organizationsYearsRepository;

   public function create(array $data): void
   {
       //Добавить дополнительные действия
      $this->_organizationsYearsRepository->create($data);
   }
}
