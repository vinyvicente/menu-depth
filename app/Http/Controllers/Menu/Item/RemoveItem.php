<?php

namespace App\Http\Controllers\Menu\Item;

use App\Http\Controllers\Controller;
use App\Menu;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RemoveItem extends Controller
{
    public function __invoke(string $id): Response
    {
        $menu = Menu::find((int) $id);
        if (!$menu) {
            return response()->json(['message' => 'Not Found'], Response::HTTP_NOT_FOUND);
        }

        $menu->delete();

        return response('', Response::HTTP_NO_CONTENT);
    }
}
