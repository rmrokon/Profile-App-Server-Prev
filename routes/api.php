<?php

use App\Http\Controllers\Api\V1\InterestController;
use App\Http\Controllers\Api\V1\ProfileAttributesController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1'], function () {
    Route::apiResource('profileAttributes', ProfileAttributesController::class);
    Route::apiResource('interests', InterestController::class);
    Route::apiResource('profiles', ProfileController::class);
    Route::apiResource('users', UserController::class);
});
