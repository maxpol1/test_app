<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{slug}', [HomeController::class, 'show'])->name('post.show');
Route::get('/tag/{slug}', [HomeController::class, 'tag'])->name('tag.show');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category.show');

//Route::get('/admin', [DashboardController::class, 'index'] );
//Route::resource('/admin/categories', 'App\Http\Controllers\Admin\CategoriesController');

Route::prefix('/admin')->name('admin.')->group(function (){
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/categories', 'App\Http\Controllers\Admin\CategoriesController');
    Route::resource('/tags', 'App\Http\Controllers\Admin\TagsController');
    Route::resource('/users', 'App\Http\Controllers\Admin\UsersController');
    Route::resource('/posts', 'App\Http\Controllers\Admin\PostsController');
});
