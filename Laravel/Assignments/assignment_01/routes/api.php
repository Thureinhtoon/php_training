<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Student\StudentAPIController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('apistudents','Student\StudentAPIController');

//Route::get('apistudents/majorsList', 'Student\StudentAPIController@getMajors');

// major list api route
//Route::get('majors', [StudentAPIController::class, 'getMajors']);
Route::get('majors', [StudentController::class, 'majorCreate']);