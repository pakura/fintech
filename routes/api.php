<?php

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

$router->group(['namespace' => 'api', 'middleware' => ['checkApiKey']], function ($router) {
    $router->get('companies', ['as' => 'companies', 'uses' => 'CollectionController@getCompanies']);
    $router->get('coupons', ['as' => 'coupons', 'uses' => 'CollectionController@getCoupons']);
    $router->post('purchase', ['as' => 'purchase', 'uses' => 'CollectionController@OrderCode']);
});
