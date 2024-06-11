<?php

namespace App\Services\ScientificSupervisors;

use App\Helpers\JsonHelper;
use App\Services\ScientificSupervisors\Repositories\ScientificSupervisorRepositoryInterface;
use Illuminate\Http\JsonResponse;

class ScientificSupervisorsService
{
    protected ScientificSupervisorRepositoryInterface $scientificSupervisorRepository;

    public function __construct(ScientificSupervisorRepositoryInterface $scientificSupervisorRepository)
    {
        $this->scientificSupervisorRepository = $scientificSupervisorRepository;
    }

    public function create(array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false, [
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ], 400);
        }
        $scientificSupervisor = $this->scientificSupervisorRepository->create($data);
        if ($scientificSupervisor and $scientificSupervisor->id) {
            return JsonHelper::sendJsonResponse(true, [
                'title' => 'Успешно',
                'message' => 'Научный руководитель успешно создан',
                'scientific_supervisor' => $scientificSupervisor
            ]);
        }
        return JsonHelper::sendJsonResponse(false, [
            'title' => 'Ошибка',
            'message' => 'При сохранении данных произошла ошибка'
        ], 403);
    }

    public function get(int $organizationId): JsonResponse
    {
        $programs = $this->scientificSupervisorRepository->get($organizationId);
        return JsonHelper::sendJsonResponse(true, [
            'title' => 'Успешно получены научные руководители',
            'scientific_supervisors' => $programs
        ]);
    }

    public function delete(int $id): JsonResponse
    {
        $flag = $this->scientificSupervisorRepository->delete($id);
        if($flag)
        {
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успешно',
                'message' => 'Научный руководитель был успешно удален'
            ]);
        }
        return JsonHelper::sendJsonResponse(false,[
            'title' => 'Ошибка',
            'message' => 'Произошла ошибка при удалении научного руководитял'
        ]);
    }
}
