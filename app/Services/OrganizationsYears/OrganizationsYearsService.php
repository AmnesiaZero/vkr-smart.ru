<?php

namespace App\Services\OrganizationsYears;

use App\Helpers\JsonHelper;
use App\Services\OrganizationsYears\Repositories\OrganizationYearRepositoryInterface;
use App\Services\Services;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class OrganizationsYearsService extends Services
{
    public $_repository;

    public function __construct(OrganizationYearRepositoryInterface $organizationYearRepository)
    {
        $this->_repository = $organizationYearRepository;
    }

    public function create(array $data): JsonResponse
    {
        $year = $this->_repository->create($data);
        return JsonHelper::sendJsonResponse(true, [
            'message' => 'Успешно создан год',
            'year' => $year
        ]);
    }

    public function get(int $organizationId): JsonResponse
    {
        $years = $this->_repository->get($organizationId);
        Log::debug('years = ' . $years);
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Года успешно получены',
            'years' => $years
        ]);
    }

    public function getByYearNumber(int $year, int $userId)
    {
        return $this->_repository->getByYearNumber($year, $userId);
    }


    public function update(int $id, array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ], 400);
        }
        $result = $this->_repository->update($id, $data);
        Log::debug('result = ' . $result);
        if ($result) {
            $year = $this->_repository->find($id);
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успех',
                'message' => 'Информация успешно сохранена',
                'year' => $year
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
        $year = $this->_repository->findWithInfo($id);
        if ($year) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'year' => $year
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Ошибка при получении информации у года'
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

        $result = $this->_repository->delete($id);

        if ($result) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Год удален успешно'
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Ошибка при удалении из базы данных'
            ], 403);
        }
    }

    public function copy(int $id): JsonResponse
    {
        if (!$id) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Не указан id ресурса'
            ]);
        }

        $year = $this->_repository->copy($id);

        Log::debug($year);

        if ($year) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Год скопирован успешно',
                'year' => $year
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Ошибка при копировании элемента'
            ]);
        }
    }
}
