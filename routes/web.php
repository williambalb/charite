<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Items\Http\Controllers\ItemController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'items'], function () use ($router) {
    $router->get('/', '\App\Items\Http\Controllers\ItemController@index');
    $router->post('/', '\App\Items\Http\Controllers\ItemController@store');
    $router->get('/{id}', '\App\Items\Http\Controllers\ItemController@find');
    $router->delete('/{id}', '\App\Items\Http\Controllers\ItemController@delete');
//    $router->post('/delete', '\App\Items\Http\Controllers\ItemController@deleteMany');
    $router->put('/{id}', '\App\Items\Http\Controllers\ItemController@update');
//    $router->post('/import', '\App\Items\Http\Controllers\ItemController@storeMany');
//    $router->get('/search', '\App\Items\Http\Controllers\ItemController@search');
});
