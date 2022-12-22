<?php

namespace App\Services;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUserService
{
    public static function create($name, $password)
    {
        return User::create([
            'id' => Str::orderedUuid(),
            'name' => $name,
            'password' => Hash::make($password),
        ]);
    }

    public static function viaRequest(RegisterRequest $request)
    {
        return self::create($request->name, $request->password);
    }
}
