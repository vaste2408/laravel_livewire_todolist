<?php

use App\Http\Controllers\TodoitemController;
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

Route::get('/', [UserController::class, 'login']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login', [UserController::class, 'authenticate'])->name('auth');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/register', [UserController::class, 'registration'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware' => ['auth']], function() {
    Route::prefix('todolist')->group(function() {
        Route::get('/', [TodoitemController::class, 'index'])->name('todolist');
    });
});
