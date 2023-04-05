<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/admin', [DashboardController::class, 'index'] );
//Route::resource('/admin/categories', 'App\Http\Controllers\Admin\CategoriesController');

Route::prefix('/admin')->name('admin.')->group(function (){
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/categories', 'App\Http\Controllers\Admin\CategoriesController');
    Route::resource('/tags', 'App\Http\Controllers\Admin\TagsController');
    Route::resource('/users', 'App\Http\Controllers\Admin\UsersController');
    Route::resource('/posts', 'App\Http\Controllers\Admin\PostsController');
});
