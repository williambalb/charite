<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Items\Http\Controllers\ItemController;
use App\Categories\Http\Controllers\CategoryController;

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

$router->group(['prefix' => 'categories'], function () use ($router) {
    $router->get('/', '\App\Categories\Http\Controllers\CategoryController@index');
    $router->post('/', '\App\Categories\Http\Controllers\CategoryController@store');
    $router->get('/{id}', '\App\Categories\Http\Controllers\CategoryController@find');
    $router->delete('/{id}', '\App\Categories\Http\Controllers\CategoryController@delete');
//    $router->post('/delete', '\App\Categories\Http\Controllers\CategoryController@deleteMany');
    $router->put('/{id}', '\App\Categories\Http\Controllers\CategoryController@update');
//    $router->post('/import', '\App\Categories\Http\Controllers\CategoryController@storeMany');
//    $router->get('/search', '\App\Categories\Http\Controllers\CategoryController@search');
});

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/', '\App\Users\Http\Controllers\UserController@index');
    $router->post('/', '\App\Users\Http\Controllers\UserController@store');
    $router->get('/{id}', '\App\Users\Http\Controllers\UserController@find');
    $router->delete('/{id}', '\App\Users\Http\Controllers\UserController@delete');
//    $router->post('/delete', '\App\Users\Http\Controllers\UserController@deleteMany');
    $router->put('/{id}', '\App\Users\Http\Controllers\UserController@update');
//    $router->post('/import', '\App\Users\Http\Controllers\UserController@storeMany');
//    $router->get('/search', '\App\Users\Http\Controllers\UserController@search');
});

$router->group(['prefix' => 'address'], function () use ($router) {
    $router->get('/', '\App\Users\Http\Controllers\Addresses\AddressController@index');
    $router->post('/', '\App\Users\Http\Controllers\Addresses\AddressController@store');
    $router->get('/{id}', '\App\Users\Http\Controllers\Addresses\AddressController@find');
    $router->delete('/{id}', '\App\Users\Http\Controllers\Addresses\AddressController@delete');
//    $router->post('/delete', '\App\Users\Http\Controllers\Addresses\AddressController@deleteMany');
    $router->put('/{id}', '\App\Users\Http\Controllers\Addresses\AddressController@update');
//    $router->post('/import', '\App\Users\Http\Controllers\Addresses\AddressController@storeMany');
//    $router->get('/search', '\App\Users\Http\Controllers\Addresses\AddressController@search');
});
