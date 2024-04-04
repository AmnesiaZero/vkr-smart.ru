<?php

use Illuminate\Http\JsonResponse;


function validatorError($validator): JsonResponse
{
    $message = '';
    foreach ($validator->messages()->all() as $msg) {
        $message .= $msg . " ";
    }
    //можно поменять на вывод вьюхи
    return response()->json($message);
}

