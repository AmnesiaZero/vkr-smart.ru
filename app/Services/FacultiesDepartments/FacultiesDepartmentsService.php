<?php

namespace App\Services\FacultiesDepartments;

use App\Helpers\JsonHelper;
use App\Models\Faculty;
use App\Models\FacultyDepartment;
use App\Services\FacultiesDepartments\Repositories\EloquentFacultyDepartmentRepository;
use App\Services\Faculties\Repositories\FacultyRepositoryInterface;
use App\Services\FacultiesDepartments\Repositories\FacultyDepartmentRepositoryInterface;
use App\Services\OrganizationsYears\Repositories\EloquentOrganizationYearRepository;
use App\Services\Services;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use function PHPUnit\Framework\isEmpty;

class FacultiesDepartmentsService extends Services
{
    public $_repository;

    public function __construct(FacultyDepartmentRepositoryInterface $specialtyRepository)
    {
        $this->_repository = $specialtyRepository;
    }

    public function create(array $data): JsonResponse
   {
       if(empty($data)){
           return JsonHelper::sendJsonResponse(false,[
               'title' => 'Ошибка',
               'message' => 'Пустой массив данных'
           ],400);
       }
       $facultyDepartment = $this->_repository->create($data);
       Log::debug('department = '.$facultyDepartment);
       if($facultyDepartment and $facultyDepartment->id)
       {
           return JsonHelper::sendJsonResponse(true,[
               'title' => 'Успешно',
               'message' => 'Кафедра успешно создана',
               'faculty_department' => $facultyDepartment
           ]);
       }
       return JsonHelper::sendJsonResponse(false,[
           'title' => 'Ошибка',
           'message' => 'При сохранении данных произошла  ошибка'
       ],403);
   }

    public function get(int $facultyId): JsonResponse
    {
        $facultyDepartments =  $this->_repository->get($facultyId);
        Log::debug('departments = '.$facultyDepartments);
        return JsonHelper::sendJsonResponse(true,[
            'title' => 'Успешно получены кафедры',
            'faculty_departments'=> $facultyDepartments
        ]);
    }

    public function getModels(int $facultyId): Collection
    {
        return $this->_repository->get($facultyId);

    }

    public function getByYearId(int $yearId): Collection
    {
         return $this->_repository->getByYearId($yearId);
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
            $facultyDepartment = FacultyDepartment::query()->find($id);
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успех',
                'message' => 'Информация успешно сохранена',
                'faculty_department' => $facultyDepartment
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'При сохранении данных произошла ошибка',
                'id' => $result->id
            ]);
        }
    }

    public function delete(int $id):JsonResponse
    {
        if (!$id) {
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'Не указан id ресурса'
            ]);
        }

        $result = $this->_repository->delete($id);



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
