<?php

namespace App\Services\OrganizationsFaculties;

use App\Helpers\JsonHelper;
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

           return JsonHelper::sendJsonResponse(false,[
               'title' => 'Ошибка',
               'message' => 'Пустой массив данных при создании факультета'
           ]);
       }
       $faculty = $this->_repository->create($data);
       if(isEmpty($faculty))
       {
           return JsonHelper::sendJsonResponse(false,[
               'title' => 'Ошибка',
               'message' => 'При сохранении данных произошла ошибка'
           ]);
       }
       return JsonHelper::sendJsonResponse(true,[
           'message' => 'Факультет был успешно создан',
           'faculty'=> $faculty
       ]);
   }

    public function get(int $yearId): JsonResponse
    {
        $faculties =  $this->_repository->get($yearId);
        return JsonHelper::sendJsonResponse(true,[
           'title' => 'Успешно получены факультеты',
            'faculties'=> $faculties
        ]);
    }
}
