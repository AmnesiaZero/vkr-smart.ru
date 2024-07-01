<?php

namespace App\Services\Faculties;

use App\Helpers\JsonHelper;
use App\Services\Faculties\Repositories\FacultyRepositoryInterface;
use App\Services\Services;
use Illuminate\Http\JsonResponse;

class FacultiesService extends Services
{
    public $_repository;

    public function __construct(FacultyRepositoryInterface $_organizationsDepartmentsRepository)
    {
        $this->_repository = $_organizationsDepartmentsRepository;
    }

    public function create(array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных при создании факультета'
            ], 400);
        }
        $faculty = $this->_repository->create($data);
        if ($faculty and $faculty->id) {
            return JsonHelper::sendJsonResponse(true, [
                'message' => 'Факультет был успешно создан',
                'faculty' => $faculty
            ]);
        }
        return JsonHelper::sendJsonResponse(false, [
            'title' => 'Ошибка',
            'message' => 'При сохранении данных произошла ошибка'
        ], 422);

    }

    public function getModels(int $yearId)
    {
        return $this->_repository->get($yearId);
    }

    public function get(int $yearId): JsonResponse
    {
        $faculties = $this->_repository->get($yearId);
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно получены факультеты',
            'faculties' => $faculties
        ]);
    }

    public function update(int $id, array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }

        $faculty = $this->_repository->update($id, $data);

        if ($faculty) {
            $faculty = $this->_repository->find($id);
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успех',
                'message' => 'Информация успешно сохранена',
                'faculty' => $faculty
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'При сохранении данных произошла ошибка',
                'id' => $faculty->id
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

        $flag = $this->_repository->delete($id);

        if ($flag) {
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

    public function copy($id)
    {

    }

    public function getYearId(int $id)
    {
        return $this->_repository->getYearId($id);
    }
}
