<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class RemoveMenu extends Controller
{
    public function __invoke(): JsonResponse
    {
        return response()->json([]);
    }
}
