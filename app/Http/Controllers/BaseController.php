<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendSuccessResponse(Request $request, string $message, array|bool $content = false, int $status = 200): JsonResponse
    {
        return response()->json([
            'success' => true,
            'status' => $status,
            'message' => $message,
            'request' => $request->all(),
            'content' => $content ?? null,
            'timestamp' => now()->toDateTimeString()
        ]);
    }

    public function sendFailureResponse(Request $request, string $message, array|bool $errors = false, int $status = 400): JsonResponse
    {
        $response = response()->json([
            'success' => false,
            'status' => $status,
            'message' => $message,
            'request' => $request->all(),
            'errors' => $errors ?? null,
            'timestamp' => now()->toDateTimeString()
        ], $status);

        return $response;
    }
}
