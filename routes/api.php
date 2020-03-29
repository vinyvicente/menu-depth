<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/', function () { return response()->json([]); });

Route::group(['namespace' => '\App\Http\Controllers\Menu', 'prefix' => 'menus'], function () {
    Route::get('/', 'ListMenu');
    Route::get('/{menu}', 'RetrieveMenu');
    Route::post('/', 'CreateMenu');
    Route::patch('/{menu}', 'UpdateMenu');
    Route::delete('/{menu}', 'RemoveMenu');
});
