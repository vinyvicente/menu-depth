<?php

namespace App\Http\Controllers\Menu\Item;

use App\Http\Controllers\Controller;
use App\Http\Resources\MenuResource;
use App\Menu;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ListItem extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return MenuResource::collection(Menu::paginate());
    }
}
