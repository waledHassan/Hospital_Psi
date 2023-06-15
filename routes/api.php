<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\AuthController;
use App\Http\Controllers\Doctor\MainController;
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


Route::group(['middleware' => 'guest:client'], function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::get('category', [MainController::class, 'category']);
Route::get('country_list', [MainController::class, 'country']);
Route::get('cities_list', [MainController::class, 'city']);
Route::post('level', [MainController::class, 'level']);
Route::post('question', [MainController::class, 'question']);
Route::post('answer', [MainController::class, 'questionAnswer']);

/*
Route::group(['middleware' => 'auth:client'], function () {
    // Route::post('sadasd', [AuthController::class, 'login']);
    Route::get('category', [MainController::class, 'category']);
    Route::get('patient', [MainController::class, 'patient']);
    Route::get('country', [MainController::class, 'country']);
    Route::get('level/{id}', [MainController::class, 'level']);
    Route::get('question', [MainController::class, 'question']);
    Route::get('questionAnswer', [MainController::class, 'questionAnswer']);
    Route::get('getProfile', [MainController::class, 'getProfile']);
    Route::post('createPatient', [MainController::class, 'createPatient']);
    Route::post('setAnswer', [MainController::class, 'setAnswer']);
});
*/