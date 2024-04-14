<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class JsonHelper
{

    /**
     * @param bool $error
     * @param string $msgType // primary, danger, success, secondary
     * @param array $data
     * @return JsonResponse
     */
    public static function sendJsonResponse(bool $success, array $data = [],int $status=200): JsonResponse
    {
        return response()->json([
            'success' => $success,
            'data' => $data
        ],$status);
    }

}
