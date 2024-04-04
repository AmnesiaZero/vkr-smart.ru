<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;

class Services
{
    public function __construct() {

    }

    /**
     * @param bool $error
     * @param string $msgType // primary, danger, success, secondary
     * @param array $data
     * @return JsonResponse
     */
    public function sendJsonResponse(bool $error, string $msgType = 'secondary', array $data = []): JsonResponse
    {
        return response()->json([
            'error' => $error,
            'msgType' => $msgType,
            'data' => $data
        ]);
    }

    /**
     * Проверка данных перед отправкой на сервер
     * @param array $data
     * @return JsonResponse|null
     */
    public function checkData(array $data): JsonResponse|null
    {
        if (empty($data)) {
            return self::sendJsonResponse(true, 'danger', [
                'title' => 'Ошибка!',
                'message' => 'Пустой массив данных'
            ]);
        }
        return null;
    }
}
