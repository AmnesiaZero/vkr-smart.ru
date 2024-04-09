<?php

namespace App\Services\OrganizationsYears;

use App\Services\OrganizationsYears\Repository\EloquentOrganizationsYearsRepository;
use App\Services\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrganizationsYearsService extends Services
{
    public EloquentOrganizationsYearsRepository $_organizationsYearsRepository;

    public function __construct()
    {
        $this->_organizationsYearsRepository = new EloquentOrganizationsYearsRepository();
    }

    public function create(array $data): void
   {
       Log::debug('Вошёл в create у Service');
       //Добавить дополнительные действия
      $this->_organizationsYearsRepository->create($data);
   }
}
