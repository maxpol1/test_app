<?php

use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
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
//Route::group([
//    'middleware' => 'admin'
//], function () {
//
//});

Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{slug}', [HomeController::class, 'show'])->name('post.show');
Route::get('/tag/{slug}', [HomeController::class, 'tag'])->name('tag.show');
Route::get('/category/{slug}', [HomeController::class, 'category'])->name('category.show');



Route::middleware('auth')->group(function (){
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'store']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::middleware('guest')->group(function (){
    Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});
//Route::get('/register', [AuthController::class, 'registerForm'])->name('registerForm');
//Route::post('/register', [AuthController::class, 'register'])->name('register');
//Route::get('/login', [AuthController::class, 'loginForm']);
//Route::post('/login', [AuthController::class, 'login']);
//Route::get('/logout', [AuthController::class, 'logout']);

//Route::get('/admin', [DashboardController::class, 'index'] );
//Route::resource('/admin/categories', 'App\Http\Controllers\Admin\CategoriesController');

Route::middleware('admin')->prefix('/admin')->name('admin.')->group(function (){
    Route::get('/', [DashboardController::class, 'index'])->middleware('admin');
    Route::resource('/categories', 'App\Http\Controllers\Admin\CategoriesController');
    Route::resource('/tags', 'App\Http\Controllers\Admin\TagsController');
    Route::resource('/users', 'App\Http\Controllers\Admin\UsersController');
    Route::resource('/posts', 'App\Http\Controllers\Admin\PostsController');
});
