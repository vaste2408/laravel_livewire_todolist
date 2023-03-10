<?php

use App\Http\Controllers\Api\ApiTodoitemController;
use App\Http\Controllers\Api\ApiUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [ApiUserController::class, 'authenticate']);
Route::post('/register', [ApiUserController::class, 'register']);

Route::middleware('authtoken')->resource('todoitems', ApiTodoitemController::class);
