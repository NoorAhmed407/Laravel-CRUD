<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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
 


Route::get('data',[dummyAPI::class, 'index']);





Route::get('student',[StudentController::class, 'getData']);
Route::get('student/{id}',[StudentController::class, 'getSingleStudent']);
Route::post('student',[StudentController::class, 'addStudent']);
Route::put('student/{id}',[StudentController::class, 'updateStudentData']);
Route::delete('student/{id}',[StudentController::class, 'deleteStudent']);


Route::resource('device', DeviceController::class);

Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);

Route::get('university',[UniversityController::class, 'index']);