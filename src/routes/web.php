<?php

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


$router->group(['prefix' => 'api', 'middleware' => 'throttle:30,1'], function () use ($router) {
    $router->get('countries', 'CountryController@index');
    $router->get('countries/{country}', 'CountryController@show');

    $router->get('countries/code/{region_code}', 'CountryController@showByRegionCode');

});
