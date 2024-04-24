<?php

namespace App\Services\Programs;

use App\Helpers\JsonHelper;
use App\Models\Program;
use App\Services\Programs\Repositories\ProgramRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ProgramsService
{
    public $_repository;

    public function __construct(ProgramRepositoryInterface $programRepository)
    {
        $this->_repository = $programRepository;
    }

    public function create(array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ], 400);
        }
        $program = $this->_repository->create($data);
        Log::debug('department = ' . $program);
        if ($program and $program->id) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Кафедра успешно создана',
                'program' => $program
            ]);
        }
        return JsonHelper::sendJsonResponse(false, [
            'title' => 'Ошибка',
            'message' => 'При сохранении данных произошла ошибка'
        ], 403);
    }

    public function get(int $facultyDepartmentId): JsonResponse
    {
        $programs = $this->_repository->get($facultyDepartmentId);
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно получены кафедры',
            'programs' => $programs
        ]);
    }

    public function getByYearId(int $yearId): Collection
    {
        return $this->_repository->getByYearId($yearId);
    }

    public function update(int $id, array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ]);
        }

        $result = $this->_repository->update($id, $data);

        if ($result) {
            $faculty = Program::query()->find($id);
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успех',
                'message' => 'Информация успешно сохранена',
                'program' => $faculty
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'При сохранении данных произошла ошибка',
                'id' => $result->id
            ]);
        }
    }

    public function find(int $id): JsonResponse
    {
        $program = $this->_repository->find($id);
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно',
            'program' => $program
        ]);
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
