<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'v1'], function () {
    Route::get('/testing/api', [UserController::class, 'api']);
    Route::get('/testing/get', [UserController::class, 'apiGet']);
    Route::post('/testing/post', [UserController::class, 'apiPost']);
    Route::put('/testing/put/{id}', [UserController::class, 'apiPut']);
    Route::delete('/testing/delete/{id}', [UserController::class, 'apiDelete']);
});
