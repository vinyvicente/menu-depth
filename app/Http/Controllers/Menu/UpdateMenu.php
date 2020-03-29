<?php

namespace App\Http\Controllers\Menu;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateMenu extends Controller
{
    public function __invoke(string $id, Request $request): JsonResponse
    {
        $request->validate(['title' => 'required|string']);

        Menu::find($id)->update($request->only(['title']));

        return (new MenuResource(Menu::find($id)))->response();
    }
}
