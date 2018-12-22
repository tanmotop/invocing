<?php
/**
 * Created by PhpStorm.
 * User: tanmo
 * Date: 2018/12/12
 * Time: 9:47 AM
 */
Route::group([
    'namespace' => 'App\Api\Controllers',
    'middleware' => ['api']
], function () {
    /// 认证
    Route::post('/auth/login', 'AuthController@login');
    Route::post('/auth/logout', 'AuthController@logout');
    Route::post('/auth/refresh', 'AuthController@refresh');
    Route::get('/auth/info', 'AuthController@info');

    Route::apiResource('items', 'ItemController');
    Route::apiResource('purchaseRecords', 'PurchaseController');
    Route::apiResource('orders', 'OrderController');
});