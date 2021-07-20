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

    Route::group(['prefix' => 'master'], function () {
        $crmUserCtrl = \App\Modules\CRM\Controllers\MasterController::class;
        Route::post('implementsByMonth', [$crmUserCtrl, 'implementsByMonth']);
        Route::post('implementsByDay', [$crmUserCtrl, 'implementsByDay']);
        Route::post('implementById', [$crmUserCtrl, 'implementById']);
        Route::post('onStepDeparture', [$crmUserCtrl, 'onStepDeparture']);
        Route::post('onStepArrived', [$crmUserCtrl, 'onStepArrived']);
        Route::post('onStepAudit', [$crmUserCtrl, 'onStepAudit']);
        Route::post('onAuditPhotoSave', [$crmUserCtrl, 'onAuditPhotoSave']);
        Route::post('onContractFileSave', [$crmUserCtrl, 'onContractFileSave']);
        Route::post('onRecordSave', [$crmUserCtrl, 'onRecordSave']);
        Route::post('onStepFinished', [$crmUserCtrl, 'onStepFinished']);
    });

});
