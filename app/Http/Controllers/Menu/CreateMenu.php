<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateMenu extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $request->validate(['title' => 'required|string']);

        return (new MenuResource(Menu::create($request->only(['title']))))->response();
    }
}
