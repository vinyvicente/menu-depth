<?php

namespace App\Http\Controllers\Menu\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Item;
use App\Menu;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateItem extends Controller
{
    public function __invoke(string $menu, Request $request): JsonResponse
    {
        $request->validate(['*.title' => 'required|string']);

        $menu = Menu::findOrFail($menu);

        array_map(fn (array $item) => Item::create(['menu_id' => $menu->id, 'title' => $item['title']]), $request->all());

        return (new MenuResource($menu))->response()->setStatusCode(201);
    }
}
