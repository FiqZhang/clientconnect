<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class MessageController extends Controller
{
    /**
     * Display a message.
     *
     * @return JsonResponse
     */
    public function showMessage(): JsonResponse
    {
        return response()->json([
            'message' => 'Hello from Laravel API!',
        ]);
    }
}
