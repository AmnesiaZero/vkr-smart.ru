<?php

namespace App\Services\FacultiesDepartments;

use App\Helpers\JsonHelper;
use App\Models\FacultyDepartment;
use App\Services\Faculties\Repositories\FacultyRepositoryInterface;
use App\Services\FacultiesDepartments\Repositories\FacultyDepartmentRepositoryInterface;
use App\Services\Services;
use App\Services\Users\Repositories\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class FacultiesDepartmentsService extends Services
{
    public FacultyDepartmentRepositoryInterface $facultyDepartmentRepository;

    public FacultyRepositoryInterface $facultyRepository;

    public UserRepositoryInterface $userRepository;


    public function __construct(
        FacultyDepartmentRepositoryInterface $specialtyRepository,
        FacultyRepositoryInterface $facultyRepository,
        UserRepositoryInterface $userRepository
    ) {
        $this->facultyDepartmentRepository = $specialtyRepository;
        $this->facultyRepository = $facultyRepository;
        $this->userRepository = $userRepository;
    }

    public function create(array $data): JsonResponse
    {
        if (!isset($data['faculty_id'])) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'При создании кафедры не указан id факультета'
            ]);
        }
        $yearId = $this->facultyRepository->getYearId($data['faculty_id']);
        $data = array_merge($data, ['year_id' => $yearId]);
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }
        $facultyDepartment = $this->facultyDepartmentRepository->create($data);
        Log::debug('department = ' . $facultyDepartment);
        if ($facultyDepartment and $facultyDepartment->id) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Кафедра успешно создана',
                'faculty_department' => $facultyDepartment
            ]);
        }
        return JsonHelper::sendJsonResponse(false, [
            'title' => 'Ошибка',
            'message' => 'При сохранении данных произошла  ошибка'
        ], 403);
    }

    public function getModels(int $facultyId): Collection
    {
        return $this->facultyDepartmentRepository->get($facultyId);

    }

    public function get(int $facultyId): JsonResponse
    {
        $facultyDepartments = $this->facultyDepartmentRepository->get($facultyId);
        Log::debug('departments = ' . $facultyDepartments);
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно получены кафедры',
            'faculty_departments' => $facultyDepartments
        ]);
    }

    public function getByYearId(int $yearId): Collection
    {
        return $this->facultyDepartmentRepository->getByYearId($yearId);
    }

    public function update(int $id, array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }

        $result = $this->facultyDepartmentRepository->update($id, $data);

        if ($result) {
            $facultyDepartment = FacultyDepartment::query()->find($id);
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успех',
                'message' => 'Информация успешно сохранена',
                'faculty_department' => $facultyDepartment
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'При сохранении данных произошла ошибка',
                'id' => $result->id
            ]);
        }
    }

    public function delete(int $id): JsonResponse
    {
        if (!$id) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Не указан id ресурса'
            ]);
        }

        $result = $this->facultyDepartmentRepository->delete($id);


        if ($result) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Факультет удален успешно'
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Ошибка при удалении из базы данных'
            ], 403);
        }
    }

    public function getByUserId(int $userId): JsonResponse
    {
        $user = $this->userRepository->find($userId);
        if (!$user) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Некорректный пользователь'
            ]);
        }
        $departments = $user->departments();
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно',
            'departments' => $departments
        ]);
    }


}
