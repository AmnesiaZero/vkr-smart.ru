<?php

namespace App\Services\OrganizationsFaculties;

use App\Helpers\JsonHelper;
use App\Models\OrganizationFaculty;
use App\Models\OrganizationYear;
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
           ],400);
       }
       $faculty = $this->_repository->create($data);
       if($faculty){
           return JsonHelper::sendJsonResponse(true,[
               'message' => 'Факультет был успешно создан',
               'faculty'=> $faculty
           ]);
       }
       return JsonHelper::sendJsonResponse(false,[
           'title' => 'Ошибка',
           'message' => 'При сохранении данных произошла ошибка'
       ],422);

   }

    public function get(int $yearId): JsonResponse
    {
        $faculties =  $this->_repository->get($yearId);
        return JsonHelper::sendJsonResponse(true,[
             'title' => 'Успешно получены факультеты',
            'faculties'=> $faculties
        ]);
    }

    public function update(int $id, array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }

        $result = $this->_repository->update($id, $data);

        if ($result) {
            $faculty = OrganizationFaculty::query()->find($id);
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успех',
                'message' => 'Информация успешно сохранена',
                'faculty' => $faculty
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'При сохранении данных произошла ошибка',
                'id' => $result->id
            ]);
        }
    }

    public function destroy(int $id):JsonResponse
    {
        if (!$id) {
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'Не указан id ресурса'
            ]);
        }

        $result = $this->_repository->destroy($id);

        if ($result) {
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успешно',
                'message' => 'Факультет удален успешно'
            ]);
        }
        else {
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'Ошибка при удалении из базы данных'
            ],403);
        }
    }
}
