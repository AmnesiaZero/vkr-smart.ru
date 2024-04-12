<?php

namespace App\Services\OrganizationsYears;

use App\Helpers\JsonHelper;
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

    public function create(array $data): JsonResponse
    {
       $year =  $this->_repository->create($data);
       return JsonHelper::sendJsonResponse(true,[
           'message' => 'Успешно создан год',
           'year' => $year
       ]);
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


   public function update(int $id,array $data): JsonResponse
   {
       if (empty($data)) {
           return JsonHelper::sendJsonResponse(false,[
               'title' => 'Ошибка',
               'message' => 'Пустой массив данных'
           ]);
       }

       $result = $this->_repository->update($id, $data);

       if ($result) {
           return JsonHelper::sendJsonResponse(true,[
               'title' => 'Успех',
               'message' => 'Информация успешно сохранена'
           ]);
       } else {
           return JsonHelper::sendJsonResponse(false,[
               'title' => 'Ошибка',
               'message' => 'При сохранении данных произошла ошибка',
               'id' => $result->id
           ]);
       }
   }
}
