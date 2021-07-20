<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AuthController;


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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/phone', [AuthController::class, 'phone']);
    Route::post('/confirmation', [AuthController::class, 'phoneConfirmation']);
    Route::post('/pass', [AuthController::class, 'passUpdate']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {

    Route::group([], function () {
        $ctr = \App\Http\Controllers\User\UserController::class;
        Route::post('user-index', [$ctr, 'index']);
        Route::post('user-store', [$ctr, 'store']);
        Route::post('user-show', [$ctr, 'show']);
        Route::post('user-destroy', [$ctr, 'destroy']);
    });

    Route::group([], function () {
        $ctr = \App\Http\Controllers\User\UserRoleController::class;
        Route::post('user-role-index', [$ctr, 'index']);
        Route::post('user-role-store', [$ctr, 'store']);
        Route::post('user-role-show', [$ctr, 'show']);
        Route::post('user-role-destroy', [$ctr, 'destroy']);
    });

    Route::group(['prefix' => 'user-role-set'], function () {
        $ctr = \App\Http\Controllers\User\UserRoleSetController::class;
        Route::post('index', [$ctr, 'index']);
        Route::post('store', [$ctr, 'store']);
        Route::post('show', [$ctr, 'show']);
        Route::post('destroy', [$ctr, 'destroy']);
    });

    Route::group([], function () {
        $ctr = \App\Http\Controllers\User\UserProfileController::class;
        Route::post('user-profile-columns', [$ctr, 'columns']);
        Route::post('user-profile-index', [$ctr, 'index']);
        Route::post('user-profile-store', [$ctr, 'store']);
        Route::post('user-profile-show/{id}', [$ctr, 'show']);
        Route::post('user-profile-destroy', [$ctr, 'destroy']);
    });
    Route::group([], function () {
        $ctr = \App\Http\Controllers\User\UserRankController::class;
        Route::post('user-rank', [$ctr, 'index']);
    });
    Route::group([], function () {
        $ctr = \App\Http\Controllers\AssistantController::class;
        Route::post('assistant', [$ctr, 'index']);
    });


});

Route::group([
    'middleware' => 'auth:api',
], function ($router) {
    Route::group([], function () {
        $ctr = \App\Http\Controllers\Helpers\HelperRegionController::class;
        Route::post('helper-region-index', [$ctr, 'index']);
        Route::post('helper-region-store', [$ctr, 'store']);
        Route::post('helper-region-show', [$ctr, 'show']);
        Route::post('helper-region-destroy', [$ctr, 'destroy']);
    });
});


Route::group([
    'middleware' => 'api',
    'prefix' => 'mobile'
], function ($router) {
    $ctr = \App\Http\Mobile\ProfileController::class;
    Route::get('profile', [$ctr, 'show']);
    Route::put('profile', [$ctr, 'store']);
    Route::delete('profile/{id}/{field}', [$ctr, 'destroy']);
    Route::post('profile-avatar', [$ctr, 'avatar']);
    Route::post('profile-notification', [$ctr, 'notification']);
    Route::post('profile-notification-update', [$ctr, 'notificationUpdate']);
});


Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'message'
], function ($router) {
    $ctr = \App\Http\Controllers\WS\MessageController::class;
    Route::get('', [$ctr, 'index']);
    Route::post('/simplePrivate', [$ctr, 'privateEvent']);
});

/** @noinspection PhpIncludeInspection */
include_once base_path('/routes/api/crm.php');
