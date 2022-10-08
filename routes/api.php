<?php

use App\Http\Controllers\{AuthController,UserController,Controller,SessionController,AnswerController};
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
Route::post('/forgot-password',[AuthController::class,'send']);
Route::post('/update', [UserController::class, 'update']);
Route::post('/setInfo', [UserController::class, 'update_1']);
Route::post('/setImage/{id}', [UserController::class, 'update_image']);

