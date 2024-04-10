<?php

namespace App\Services\OrganizationsYears;

use App\Services\OrganizationsYears\Repositories\EloquentOrganizationYearRepository;
use App\Services\OrganizationsYears\Repositories\OrganizationYearRepositoryInterface;
use App\Services\Services;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class OrganizationsYearsService extends Services
{
    public $_repository;

    public function __construct(OrganizationYearRepositoryInterface $organizationYearRepository)
    {
        $this->_repository = $organizationYearRepository ;
    }

    public function create(array $data): void
   {
       $this->_repository->create($data);
   }

   public function get(int $organizationId): JsonResponse|Collection
   {
       $result =  $this->_repository->get($organizationId);
//       if(isEmpty($result)){
//           return $this->sendJsonResponse(true,'success',[
//               'title' => 'Ошибка',
//               'message' => 'Не найдены годы'
//           ]);
//       }
       return $result;
   }
}
