<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Item extends Model
{
    use QueryCacheable;

    protected $fillable = ['menu_id', 'title'];
}
