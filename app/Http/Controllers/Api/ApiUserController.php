<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\CreateUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiUserController extends Controller
{
    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            return Auth::id();
        }
        return response('Bad login',401);
    }

    public function register(RegisterRequest $request)
    {
        return CreateUserService::make($request);
    }
}
