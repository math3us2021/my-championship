<?php

namespace App\Helpers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class HttpResponseHelper
{
    public static function badRequest($errors = null)
    {
        if ($errors instanceof Exception) {
            return response()->json([
                'error' => $errors->getMessage()
            ], Response::HTTP_BAD_REQUEST);
        } else if (is_array($errors)) {
            return response()->json([
                'errors' => $errors
            ], Response::HTTP_BAD_REQUEST);
        }

        return response()->json([
            'error' => 'Bad Request'
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
