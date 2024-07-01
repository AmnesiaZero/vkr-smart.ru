<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class ValidatorHelper
{
    public static function error($validator): JsonResponse
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

    public static function redirectError($validator):RedirectResponse
    {
        $message = '';
        foreach ($validator->messages()->all() as $msg) {
            $message .= $msg . " ";
        }
        return back()->withErrors($message);
    }
}
