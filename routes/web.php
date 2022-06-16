<?php

use App\Http\Controllers\admin;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\UserController;
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

Route::get('/',  [App\Http\Controllers\PostsController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::POST('/home', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/admin', [admin::class, 'index'])->name('admin');
Route::post('/admin', [admin::class, 'store'])->name('admin');
Route::get('/Cart', [App\Http\Controllers\HomeController::class, 'Cart'])->name('Cart');
Route::get('/buy', [App\Http\Controllers\HomeController::class, 'buy'])->name('buy');
Route::get('/testimonials', [App\Http\Controllers\generalController::class, '/testimonials'])->name('/testimonials');
Route::resource('/blog', PostsController::class);
