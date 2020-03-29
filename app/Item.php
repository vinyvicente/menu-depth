<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Item extends Model
{
    use QueryCacheable;

    protected $fillable = ['menu_id', 'title'];

    public static function withMenu(Menu $menu)
    {
        return self::query()->where('menu_id', $menu->id)->orderByDesc('id');
    }
}
