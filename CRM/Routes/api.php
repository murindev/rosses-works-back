<?php

use Illuminate\Support\Facades\Route;

Route::group([
//    'middleware' => 'auth:api',
    'prefix' => 'crm'
], function ($router) {

    Route::group(['prefix' => 'user'], function () {
        $crmUserCtrl = CRM\Controllers\UserController::class;
        Route::get('index', [$crmUserCtrl, 'index']);
    });

});
