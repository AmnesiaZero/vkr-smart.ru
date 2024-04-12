<?php

namespace App\Services\OrganizationsFacultiesDepartments;

use App\Services\OrganizationsFacultiesDepartments\Repositories\EloquentOrganizationFacultyDepartmentRepository;
use App\Services\OrganizationsFaculties\Repositories\OrganizationFacultyRepositoryInterface;
use App\Services\OrganizationsYears\Repositories\EloquentOrganizationYearRepository;
use App\Services\Services;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class OrganizationsFacultiesDepartmentsService extends Services
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
               'message' => 'Пустой массив данных'
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
           'message' => 'Кафедра успешно создана'
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
