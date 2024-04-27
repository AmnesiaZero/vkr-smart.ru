<?php

namespace App\Services\Specialties;

use App\Helpers\JsonHelper;
use App\Models\Faculty;
use App\Services\Specialties\Repositories\SpecialtyRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class SpecialtiesService
{
    public $_repository;

    public function __construct(SpecialtyRepositoryInterface $specialtyRepository)
    {
        $this->_repository = $specialtyRepository;
    }

    public function create(array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ], 400);
        }
        $specialty = $this->_repository->create($data);
        Log::debug('department = ' . $specialty);
        if ($specialty and $specialty->id) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Кафедра успешно создана'
            ]);
        }
        return JsonHelper::sendJsonResponse(false, [
            'title' => 'Ошибка',
            'message' => 'При сохранении данных произошла ошибка'
        ], 403);
    }

    public function all(): JsonResponse
    {
        $specialties = $this->_repository->all();
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно получены направления',
            'specialties' => $specialties
        ]);
    }

    public function update(int $specialtyId, array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }

        $specialtyId = $this->_repository->update($specialtyId, $data);

        if ($specialtyId) {
            $faculty = Faculty::query()->find($specialtyId);
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успех',
                'message' => 'Информация успешно сохранена',
                'faculty' => $faculty
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'При сохранении данных произошла ошибка',
                'id' => $specialtyId->id
            ]);
        }
    }

    public function find(int $id): Model
    {
        return $this->_repository->find($id);
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
}
