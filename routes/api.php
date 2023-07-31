<?php

use App\Http\Controllers\Api\AuthControllerApi;
use App\Http\Controllers\Api\CityControllerApi;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::apiResources('cities', CityControllerApi::class);
Route::apiResources([
    'cities/api' => 'App\Http\Controllers\Api\CityControllerApi',

]);
Route::prefix('auth/')->group(function () {
    Route::post('register', [AuthControllerApi::class, 'Register']);
    Route::post('login', [AuthControllerApi::class, 'Login']);
    Route::get('logout', [AuthControllerApi::class, 'Logout']);
    Route::post('forgetpassword', [AuthControllerApi::class, 'ForgetPassword']);
    Route::post('resetpassword', [AuthControllerApi::class, 'ResetPassword']);
});
