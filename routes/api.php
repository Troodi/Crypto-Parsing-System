<?php
/** @var \Laravel\Lumen\Routing\Router $router */


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('test', '\App\Http\Controllers\Api\NewsController@getNews');
});
