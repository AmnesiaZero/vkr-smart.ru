<?php

namespace App\Services\ProgramsSpecialties;

use App\Helpers\JsonHelper;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Services\Programs\Repositories\ProgramRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class ProgramsSpecialtiesService extends Controller
{

    public $_repository;

    public function __construct(ProgramRepositoryInterface $programRepository)
    {
        $this->_repository = $programRepository;
    }

    public function create(array $data): JsonResponse
    {
        if(empty($data)){
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ],400);
        }
        $program = $this->_repository->create($data);
        Log::debug('department = '.$program);
        if($program and $program->id)
        {
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успешно',
                'message' => 'Кафедра успешно создана',
                'program' => $program
            ]);
        }
        return JsonHelper::sendJsonResponse(false,[
            'title' => 'Ошибка',
            'message' => 'При сохранении данных произошла ошибка'
        ],403);
    }

    public function get(int $programId): JsonResponse
    {
        $programSpecialties =  $this->_repository->get($programId);
        return JsonHelper::sendJsonResponse(true,[
            'title' => 'Успешно получены программы',
            'program_specialties'=> $programSpecialties
        ]);
    }

    public function update(int $id, array $data): JsonResponse
    {
        if (empty($data)) {
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'Пустой массив данных'
            ],400);
        }

        $result = $this->_repository->update($id, $data);

        if ($result) {
            $faculty = Program::query()->find($id);
            return JsonHelper::sendJsonResponse(true,[
                'title' => 'Успех',
                'message' => 'Информация успешно сохранена',
                'program' => $faculty
            ]);
        } else {
            return JsonHelper::sendJsonResponse(false,[
                'title' => 'Ошибка',
                'message' => 'При сохранении данных произошла ошибка',
                'id' => $result->id
            ],400);
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

        $flag = $this->_repository->delete($id);

        if ($flag) {
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
