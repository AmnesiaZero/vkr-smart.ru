<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class ValidatorHelper
{
    public static function validatorError($validator): JsonResponse
    {
        $message = '';
        foreach ($validator->messages()->all() as $msg) {
            $message .= $msg . " ";
        }
        return JsonHelper::sendJsonResponse(false, [
            'title' => 'Ошибка валидации',
            'message' => $message
        ]);
    }
}
