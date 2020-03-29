<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Menu;
use Illuminate\Http\JsonResponse;

class RetrieveMenu extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        return (new MenuResource(Menu::find((int) $id)))->response();
    }
}
