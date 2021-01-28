<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'crm'
], function ($router) {
    Route::group(['prefix' => 'user'], function () {
        $crmUserCtrl = \App\Modules\CRM\Controllers\UserController::class;
        Route::get('index', [$crmUserCtrl, 'index']);
        Route::post('store', [$crmUserCtrl, 'store']);
        Route::get('show/{id}', [$crmUserCtrl, 'show']);
        Route::post('userToStaff', [$crmUserCtrl, 'userToStaff']);
        Route::post('deactivateUser', [$crmUserCtrl, 'deactivateUser']);
    });

});
