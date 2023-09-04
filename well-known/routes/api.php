<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TestSeriesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\LiveClassController;
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

Route::group(['prefix' => 'user/'], function () {
    Route::post('login', [UsersController::class, 'login']);
    Route::post('login/using/otp', [UsersController::class, 'login_by_otp']);
    Route::post('login/using/mobile', [UsersController::class, 'loginByMobile']);
    Route::post('register', [UsersController::class, 'user_signup']);
});

Route::get('get/tests/list', [TestSeriesController::class, 'list']);
Route::get('get/quiz/list', [TestSeriesController::class, 'Quizlist']);
Route::get('get/test/detail', [TestSeriesController::class, 'test_detail']);
Route::get('get/purchased/products',[TestSeriesController::class,'purchased_products']);

Route::get('get/courses/list', [CategoryController::class, 'coursesList']);

Route::post('payment/detail/store', [PaymentController::class, 'successData']);

Route::post('test/start', [TestSeriesController::class, 'test_start_data']);

Route::post('user/updateProfile',[UsersController::class,'userProfile_Update']);

Route::post('user/data_by/id',[UsersController::class,'user_detail']);

Route::post('yt_videos/all',[LiveClassController::class,'ytVideos']);
