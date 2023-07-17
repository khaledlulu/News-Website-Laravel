<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AuthorCountroller;
use App\Http\Controllers\Categorycontroller;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Role_PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\Website\HomeController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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
Route::prefix('news/')->middleware('guest:admin,author')->group(function () {
    Route::get('{guard}/login', [UserAuthController::class, 'showLogin'])->name('login.view');
    Route::post('{guard}/login', [UserAuthController::class, 'login']);
});

Route::prefix('news/admin/')->middleware('auth:admin,author')->group(function () {
    Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout.news');
});

Route::prefix('news/admin/')->middleware('auth:admin,author')->group(function () {
    Route::view('', 'cms.parant')->name('Home');
    Route::view('temp', 'cms.temp')->name('temp');
    Route::resource('countries', CountryController::class);
    Route::resource('cities', CityController::class);
    Route::post('update_cities/{id}', [CityController::class, 'update'])->name('update_cities');
    Route::resource('admins', adminController::class);
    Route::post('update_admins/{id}', [adminController::class, 'update'])->name('update_admins');
    Route::resource('authors', AuthorCountroller::class);
    Route::post('update_authors/{id}', [AuthorCountroller::class, 'update'])->name('update_authors');
    Route::resource('categories', Categorycontroller::class);
    Route::post('update_categories/{id}', [Categorycontroller::class, 'update'])->name('update_categories');
    Route::resource('articles', ArticlesController::class);
    Route::post('update_articles/{id}', [ArticlesController::class, 'update'])->name('update_articles');
    Route::get('/create/articles/{id}', [ArticlesController::class, 'createArticles'])->name('createArticles');
    Route::get('/index/articles/{id}', [ArticlesController::class, 'indexArticles'])->name('indexArticles');

    Route::resource('roles', RoleController::class);
    Route::post('update_roles/{id}', [RoleController::class, 'update'])->name('update_roles');
    Route::resource('permissions', PermissionController::class);
    Route::post('update_permissions/{id}', [PermissionController::class, 'update'])->name('update_permissions');
    Route::resource('roles.permission', Role_PermissionController::class);

    Route::resource('sliders', SliderController::class);
    Route::post('update_sliders/{id}', [SliderController::class, 'update'])->name('update_sliders');
    Route::resource('comments', CommentController::class);
    Route::resource('contacts', ContactController::class);
});
// ['namespace' => 'website']
Route::prefix('/Home')->group(function () {

    Route::get('Home', [HomeController::class, 'parant'])->name('Home');
    Route::get('index', [HomeController::class, 'index'])->name('index');
    Route::get('contact', [HomeController::class, 'contact'])->name('website.contact');
    Route::post('contact', [ContactController::class, 'store'])->name('store.contact');
    // Route::view('x1' , 'website.index')->name('website.index');
    // Route::view('x2' , 'website.contact')->name('website.contact');
    // Route::view('x3' , 'website.all-news')->name('website.all-news');

    // Route::view('x4' , 'website.newsdetailes')->name('website.det');

    // Route::get('show/{id}' , [HomeController::class , 'showDet'])->name('website.det');
    // Route::get('all/{id}' , [HomeController::class , 'allNews'])->name('website.all');
    // Route::get('all/{id}' , [HomeController::class , 'allNews'])->name('website.all');
    // Route::post('comment/{id}' , [HomeController::class , 'storComment'])->name('website.storComment');



});
