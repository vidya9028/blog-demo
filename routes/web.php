<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function() {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
    Route::controller(\App\Http\Controllers\Admin\CategoryController::class)->group(function(){
        Route::get('category', 'index');
        Route::get('add-category', 'create');
        Route::post('add-category','store');
        Route::get('category/{category_id}','edit');
        Route::put('update-category/{category_id}','update');
        Route::get('delete-category/{category_id}','destroy');
    });

    Route::controller(\App\Http\Controllers\Admin\PostController::class)->group(function(){
        Route::get('posts','index');
        Route::get('add-post','create');
        Route::post('add-post','store');
    });
});