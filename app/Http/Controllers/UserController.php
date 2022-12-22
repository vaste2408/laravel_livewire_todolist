<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Services\CreateUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.login', ['title' => 'Login form']);
    }

    public function authenticate(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();
            return redirect()
                ->route('todolist')
                ->with('success', 'Successful login');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ])->onlyInput('name');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function registration()
    {
        return view('auth.register', ['title' => 'Registration']);
    }

    public function register(RegisterRequest $request)
    {
        $user = CreateUserService::viaRequest($request);
        Auth::login($user);
        return redirect()
            ->route('todolist')
            ->with('success', 'Successful registration');
    }
}
