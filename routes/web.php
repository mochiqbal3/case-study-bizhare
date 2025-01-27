<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix'=>'auth'], function () use ($router){
    $router->post('/register', 'AuthController@register');
    $router->post('/login', 'AuthController@login');
});

$router->group(['prefix'=>'master'], function () use ($router){
    $router->group(['prefix'=>'article'], function () use ($router){
        $router->get('/', 'ArticlesController@index');
        $router->get('/{id}', 'ArticlesController@detail');
        $router->get('/category/{id}', 'ArticlesController@show');
        $router->post('/insert', 'ArticlesController@store');
        $router->put('/update/{id}', 'ArticlesController@update');
        $router->delete('/delete/{id}', 'ArticlesController@destroy');
    });
    $router->group(['prefix'=>'bantuan'], function () use ($router){
        $router->get('/', 'BantuansController@index');
        $router->get('/{id}', 'BantuansController@show');
        $router->post('/insert', 'BantuansController@store');
        $router->put('/update/{id}', 'BantuansController@update');
        $router->delete('/delete/{id}', 'BantuansController@destroy');
    });
});