<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function sendSuccessResponse(Request $request, string $message, array|bool $content = false, int $status = 200)
    {
        return response()->json([
            'success' => true,
            'status' => $status,
            'message' => $message,
            'request' => $request->all(),
            'content' => $content ?? null
        ]);
    }

    public function sendFailureResponse(Request $request, string $message, array|bool $errors = false, int $status = 400)
    {
        $response = response()->json([
            'success' => false,
            'status' => $status,
            'message' => $message,
            'request' => $request->all(),
            'errors' => $errors ?? null
        ], $status);

        return $response;
    }
}
