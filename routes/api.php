<?php
/** @var \Laravel\Lumen\Routing\Router $router */


/*
 * Роут для вызова апи
 */
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('test', '\App\Http\Controllers\Api\NewsController@getNews');
});
