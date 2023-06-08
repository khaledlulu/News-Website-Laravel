<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('news/admin/')->group(function () {
    Route::view('test', 'cms.parant');
    Route::view('temp', 'cms.temp');
    Route::resource('countries', CountryController::class);
    Route::resource('cities', CityController::class);
    Route::post('update_cities/{id}', [CityController::class, 'update'])->name('update_cities');
    Route::resource('admins', adminController::class);
    Route::post('update_admins/{id}', [adminController::class, 'update'])->name('update_admins');
});
