<?php

namespace App\Services\OrganizationsFaculties;

use App\Services\OrganizationsFaculties\Repositories\OrganizationFacultyRepositoryInterface;
use App\Services\OrganizationsYears\Repositories\EloquentOrganizationYearRepository;
use App\Services\Services;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class OrganizationsFacultiesService extends Services
{
    public $_repository;

    public function __construct(OrganizationFacultyRepositoryInterface $_organizationsDepartmentsRepository)
    {
        $this->_repository = $_organizationsDepartmentsRepository;
    }

    public function create(array $data): JsonResponse
   {
       if(empty($data)){
           return $this->sendJsonResponse(true,'success',[
               'title' => 'Ошибка',
               'message' => 'Пустой массив данных при создании департамента'
           ]);
       }
       $result = $this->_repository->create($data);
       if(isEmpty($result))
       {
           return $this->sendJsonResponse(true,'success',[
               'title' => 'Ошибка',
               'message' => 'При сохранении данных произошла ошибка'
           ]);
       }
       return $this->sendJsonResponse(false,'success',[
           'title' => 'Успешно',
           'message' => 'Департамент успешно создан'
       ]);
   }

    public function get(int $organizationId): JsonResponse|Collection
    {
        $result =  $this->_repository->get($organizationId);
//        if(isEmpty($result)){
//            return $this->sendJsonResponse(true,'success',[
//                'title' => 'Ошибка',
//                'message' => 'Не найдены департаменты'
//            ]);
//        }
        return $result;
    }
}
