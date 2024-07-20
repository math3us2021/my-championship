<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class HttpResponseHelper
{
    public static function badRequest(\Exception $error): JsonResponse
    {
        return response()->json([
            'error' => $error->getMessage(),
        ], Response::HTTP_BAD_REQUEST);
    }


    public static function serverError(): JsonResponse
    {
        return response()->json([
            'error' => 'Internal Server Error',
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }


    public static function ok($data, $params): JsonResponse
    {
        return response()->json($data, $params);
    }

}
