<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Interfaces\Http\Controller\{
    ConsumerController,
};

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

Route::get('/health', function (Request $request) {
    return "Everything is ok!";
});

Route::prefix('v1')->group(function () {
    Route::post('/consumer', [ConsumerController::class, 'create']);
	Route::get('/consumer/{id}', [ConsumerController::class, 'get']);
	Route::get('/consumer', [ConsumerController::class, 'getAll']);
    Route::patch('/consumer/{id}', [ConsumerController::class, 'update']);
    Route::delete('/consumer/{id}', [ConsumerController::class, 'delete']);
	Route::middleware('auth')->group(function () {});
});
