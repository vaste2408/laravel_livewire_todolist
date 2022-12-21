<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUserService
{
    public static function make (RegisterRequest $request)
    {
        return User::create([
            'id' => Str::orderedUuid(),
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);
    }
}
