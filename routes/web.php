<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/dashboard', [DashboardController::class, 'dash']) ->name('dashboard');


Route::get('/register', [RegisterController::class, 'index']) ->name('register');
Route::post('/register', [RegisterController::class, 'store']) ->name('register');


/*Route::get('/posts', function () {
    return view('posts.index');
});
*/

Route::get('/posts', [PostController::class, 'posts']) -> name('posts');

Route::get('/login', [LoginController::class, 'login']) -> name('login');
