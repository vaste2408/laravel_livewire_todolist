<?php

namespace App\Services;

use App\Http\Requests\StoreTodoitemRequest;
use App\Models\Todoitem;

class CreateTodoitemService
{
    public static function create($text, $user_id)
    {
        return Todoitem::create([
           'text' => $text,
            'user_id' => $user_id
        ]);
    }

    public static function viaRequest(StoreTodoitemRequest $request)
    {
        return self::create($request->text, $request->token);
    }
}
