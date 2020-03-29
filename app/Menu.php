<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Rennokki\QueryCache\Traits\QueryCacheable;

class Menu extends Model
{
    use QueryCacheable;

    protected $fillable = ['title'];
}
