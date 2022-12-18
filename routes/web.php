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
Route::post('/login', [UserController::class, 'authenticate'])->name('auth');
Route::get('/register', [UserController::class, 'registration']);
Route::post('/register', [UserController::class, 'register']);

Route::group(['middleware' => ['auth']], function() {
    Route::prefix('todolist')->group(function() {
        Route::get('/', [TodoitemController::class, 'index']);
        Route::get('/add', [TodoitemController::class, 'create']);
        Route::post('/add', [TodoitemController::class, 'store']);
    });
});
